const path = require('path');
const { src, dest, series } = require('gulp');
const purgecss = require('gulp-purgecss');
const replace = require('gulp-replace');
const useref = require('gulp-useref');
var uglify = require('gulp-uglify');
const fs = require('fs');

module.exports = conf => {
  // Copy templatePath html files and assets to buildPath
  // -------------------------------------------------------------------------------
  const prodCopyHTMLTask = function () {
    return src(`${templatePath}/*.html`).pipe(dest(`${buildPath}/`));
  };

  const prodCopyAssetsTask = function () {
    return src('assets/**/*').pipe(dest(`${buildPath}/assets/`));
  };

  // Rename assets path
  // -------------------------------------------------------------------------------
  const prodRenameTasks = function () {
    return src(`${buildPath}/**/*`)
      .pipe(replace('../../assets', 'assets'))
      .pipe(dest(`${buildPath}`));
  };

  // Combine js vendor assets in single core.js file using UseRef
  // -------------------------------------------------------------------------------
  const prodUseRefTasks = function () {
    return src(`${buildPath}/*.html`).pipe(useref()).pipe(dest(buildPath));
  };

  // Uglify assets/js files
  //--------------------------------------------------------------------------------
  const prodMinifyJSTasks = function () {
    return src(`${buildPath}/assets/js/**/*.js`)
      .pipe(uglify())
      .pipe(dest(`${buildPath}/assets/js/`));
  };

  // Suppress DeprecationWarning for useref()
  process.removeAllListeners('warning');

  process.on('warning', warning => {
    if (warning.name === 'DeprecationWarning' && warning.code === 'DEP0180') {
      return;
    }
    console.warn(warning.name, warning.message);
  });

  const prodPurgecssTasks = function () {
    let iconClasses = [];
    try {
      // Define the directory where JSON files are stored
      const jsonDirectory = path.join(__dirname, '../assets/json');

      // Read all JSON files in the directory
      const files = fs.readdirSync(jsonDirectory).filter(file => file.endsWith('.json'));

      // Loop through each JSON file and extract icons
      files.forEach(file => {
        const jsonFilePath = path.join(jsonDirectory, file);
        const searchData = JSON.parse(fs.readFileSync(jsonFilePath, 'utf8'));

        // Check if the file contains the 'suggestions' and 'navigation' keys before processing
        if (searchData.suggestions || searchData.navigation) {
          // Combine suggestions and navigation from the current JSON file
          const allGroups = [...Object.values(searchData.suggestions), ...Object.values(searchData.navigation)];

          allGroups.forEach(group => {
            group.forEach(item => {
              if (item.icon) {
                // Add icon to the list
                iconClasses.push(`${item.icon}`);
              }
            });
          });
        }
      });
    } catch (error) {
      console.warn('⚠️ Could not load JSON files. Running without dynamic safelist for icons.', error);
    }
    return src(`${buildPath}/**/*.css`)
      .pipe(
        purgecss({
          content: [`${buildPath}/*.html`, `${buildPath}/**/*.js`],
          defaultExtractor: content => {
            const classPattern = /classList\.add\(['"`]([\w- ]+)['"`]\)/g;
            const attrPattern = /setAttribute\(['"`](data-[\w-]+|aria-[\w-]+)['"`]/g;

            let dynamicClasses = new Set();
            let dynamicAttributes = new Set();
            let match;

            // Extract dynamically added classes
            while ((match = classPattern.exec(content)) !== null) {
              match[1].split(' ').forEach(cls => dynamicClasses.add(cls.trim()));
            }

            // Extract dynamically added attributes
            while ((match = attrPattern.exec(content)) !== null) {
              dynamicAttributes.add(match[1]);
            }

            // Extract static classes from the content
            const staticClasses = content.match(/[\w-/:]+(?<!:)/g) || [];
            return [...staticClasses, ...dynamicClasses];
          },
          safelist: {
            standard: [
              /^(is-|has-)/ // Keep utility classes
            ],
            greedy: [
              /^ps__rail/,
              /^fc/,
              /^aa/,
              /^select2/,
              /^swiper-pagination/,
              /^swal2/,
              /^plyr/,
              /^noUi/,
              ...iconClasses.map(icon => new RegExp(`^${icon}$`)) // Dynamically added icon classes
            ],
            deep: [/^data-bs/]
          }
        })
      )
      .pipe(dest(`${buildPath}`)); // Destination is the assets folder to overwrite in-place
  };

  const prodAllTask = series(
    prodCopyHTMLTask,
    prodCopyAssetsTask,
    prodRenameTasks,
    prodMinifyJSTasks,
    prodPurgecssTasks,
    prodUseRefTasks
  );

  // Exports
  // ---------------------------------------------------------------------------

  return {
    copy: prodCopyHTMLTask,
    copyAssests: prodCopyAssetsTask,
    rename: prodRenameTasks,
    useref: prodUseRefTasks,
    minifyJS: prodMinifyJSTasks,
    purgecss: prodPurgecssTasks,
    all: prodAllTask
  };
};
