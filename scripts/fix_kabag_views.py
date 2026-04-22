#!/usr/bin/env python3
"""
Fix Kabag index views to add:
1. card-header with search form
2. Remove card-datatable from wrapper (change to just table-responsive)
3. Add card-body with $proposals->links() pagination
"""

import os
import re

# Mapping: (view_path, route_url, loop_variable, placeholder)
views = [
    # SKPD
    ('Modules/Kabag/Resources/views/skpd/Proposal/index.blade.php',
     '/kabag/skpd/proposal', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/skpd/komite/index.blade.php',
     '/kabag/skpd/komite', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/skpd/nasabah/index.blade.php',
     '/kabag/skpd/nasabah', 'proposals', 'Cari nama nasabah...'),
    # UMKM
    ('Modules/Kabag/Resources/views/Umkm/Proposal/index.blade.php',
     '/kabag/umkm/proposal', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/Umkm/komite/index.blade.php',
     '/kabag/umkm/komite', 'komites', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/Umkm/nasabah/index.blade.php',
     '/kabag/umkm/nasabah', 'proposals', 'Cari nama nasabah...'),
    # Pasar
    ('Modules/Kabag/Resources/views/pasar/Proposal/index.blade.php',
     '/kabag/pasar/proposal', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/pasar/komite/index.blade.php',
     '/kabag/pasar/komite', 'komites', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/pasar/nasabah/index.blade.php',
     '/kabag/pasar/nasabah', 'proposals', 'Cari nama nasabah...'),
    # PPR
    ('Modules/Kabag/Resources/views/ppr/proposal/index.blade.php',
     '/kabag/ppr/proposal', 'proposals', 'Cari nama pemohon...'),
    ('Modules/Kabag/Resources/views/ppr/komite/index.blade.php',
     '/kabag/ppr/komite', 'proposals', 'Cari nama pemohon...'),
    ('Modules/Kabag/Resources/views/ppr/nasabah/index.blade.php',
     '/kabag/ppr/nasabah', 'proposals', 'Cari nama pemohon...'),
    # P3K
    ('Modules/Kabag/Resources/views/p3k/proposal/index.blade.php',
     '/kabag/p3k/proposal', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/p3k/komite/index.blade.php',
     '/kabag/p3k/komite', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/p3k/nasabah/index.blade.php',
     '/kabag/p3k/nasabah', 'proposals', 'Cari nama nasabah...'),
    # UltraMikro
    ('Modules/Kabag/Resources/views/ultra_mikro/proposal/index.blade.php',
     '/kabag/ultra_mikro/proposal', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/ultra_mikro/komite/index.blade.php',
     '/kabag/ultra_mikro/komite', 'proposals', 'Cari nama nasabah...'),
    ('Modules/Kabag/Resources/views/ultra_mikro/nasabah/index.blade.php',
     '/kabag/ultra_mikro/nasabah', 'proposals', 'Cari nama nasabah...'),
]

BASE = '/Users/ajspryn/Project/fos'

def fix_view(filepath, route_url, loop_var, placeholder):
    with open(filepath, 'r') as f:
        content = f.read()

    original = content

    # Step 1: Remove card-datatable class, keep just table-responsive
    content = content.replace(
        '<div class="card-datatable table-responsive pt-0">',
        '<div class="table-responsive">'
    )

    # Step 2: Add card-header search form before <div class="table-responsive">
    search_form = f'''            <div class="card-header">
                <form method="GET" action="{route_url}" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="{placeholder}" value="{{{{ request('search') }}}}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{route_url}" class="btn btn-secondary">Reset</a>
                </form>
            </div>
            '''

    if '<div class="table-responsive">' in content and '            <div class="card-header">' not in content:
        content = content.replace(
            '            <div class="table-responsive">',
            search_form + '<div class="table-responsive">'
        )

    # Step 3: Add card-body pagination after closing </div> of table-responsive
    # Find the closing </div> that ends the table-responsive section
    # We'll add pagination after </div>\n                        </div> (card outer)
    # The structure is:
    #     </table>\n            </div>\n                        </div>\n    ... </section>
    # We want to add before the second </div>
    
    # Insert pagination after the closing </div> of table-responsive div
    # Pattern: </div>\n        </div>\n    </section>
    # The table-responsive closing is followed by card closing, then section
    
    # Look for the table's closing then table-responsive closing
    # In the view, the pattern is:
    #   </table>\n            </div> <- table-responsive
    #            </div>              <- card
    
    pagination_html = f'\n            <div class="card-body">\n                {{{{ ${loop_var}->links() }}}}\n            </div>'
    
    # Add pagination after the </div> that closes table-responsive (which comes after </table>)
    # The pattern: </div>\n                        </div>\n    </div>
    # Let's look for:  </table>\n\n            </div>\n                        </div>
    # Or: </table>\n            </div>\n                </div>
    
    if f'${loop_var}->links()' not in content:
        # Replace the pattern: </table>\n            </div>\n                        </div>
        # with: </table>\n            </div>\n            <div class="card-body">...\n            </div>\n                        </div>
        
        # Try different patterns for the closing divs
        # Pattern 1: table-responsive closes with 2 levels of divs after
        pattern1 = '                    </tbody>\n                            </table>\n\n                            </div>\n                        </div>'
        replacement1 = f'                    </tbody>\n                            </table>\n\n                            </div>{pagination_html}\n                        </div>'
        
        if pattern1 in content:
            content = content.replace(pattern1, replacement1)
        else:
            # Pattern 2: more common structure
            # Find </div> after </table> and add pagination before card closing </div>
            # Let's try a simpler approach - find the first </div></div> after table-responsive
            
            # Match: table closing + table-responsive closing div
            table_close_pattern = re.search(
                r'(</tbody>\s*</table>\s*</div>)(\s*</div>\s*</div>\s*</section>)',
                content, re.DOTALL
            )
            if table_close_pattern:
                old = table_close_pattern.group(0)
                new = table_close_pattern.group(1) + f'\n            <div class="card-body">\n                {{{{ ${loop_var}->links() }}}}\n            </div>' + table_close_pattern.group(2)
                content = content.replace(old, new, 1)

    if content != original:
        with open(filepath, 'w') as f:
            f.write(content)
        print(f"✅ Updated: {filepath.split('/')[-1]}")
    else:
        print(f"⚠️  No change: {filepath.split('/')[-1]}")


for rel_path, route_url, loop_var, placeholder in views:
    filepath = os.path.join(BASE, rel_path)
    if not os.path.exists(filepath):
        print(f"❌ Not found: {rel_path}")
        continue
    try:
        fix_view(filepath, route_url, loop_var, placeholder)
    except Exception as e:
        print(f"❌ Error {rel_path}: {e}")

print("\nDone!")
