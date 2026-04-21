// import { autocomplete } from '@algolia/autocomplete-js';

import { autocomplete, getAlgoliaResults } from '@algolia/autocomplete-js';

try {
  window.autocomplete = autocomplete;
} catch (e) {}

export { autocomplete };
