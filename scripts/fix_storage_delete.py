#!/usr/bin/env python3
"""Fix Storage::delete() calls to use public disk"""

import os

base = '/Users/ajspryn/Project/fos'

files = [
    'Modules/P3k/Http/Controllers/P3kRevisiController.php',  # already done but verify
    'Modules/Skpd/Http/Controllers/SkpdRevisiController.php',
    'Modules/Umkm/Http/Controllers/UmkmRevisiController.php',
]

old = 'Storage::delete('
new = 'Storage::disk(\'public\')->delete('

for filepath in files:
    full_path = os.path.join(base, filepath)
    with open(full_path, 'r') as f:
        content = f.read()
    count = content.count(old)
    content = content.replace(old, new)
    with open(full_path, 'w') as f:
        f.write(content)
    print(f"{filepath}: {count} replacement(s)")

print("Done!")
