#!/usr/bin/env python3
import re
from pathlib import Path

root=Path('.')
patterns=[
    (re.compile(r"(?:\.\./)+app-assets/([\w\-./]+)"), r"{{ asset('app-assets/\1') }}"),
    (re.compile(r"(?:\.\./)+assets/([\w\-./]+)"), r"{{ asset('assets/\1') }}"),
    (re.compile(r"(?:\.\./)+faviconBTB\.png"), r"{{ asset('faviconBTB.png') }}"),
    (re.compile(r"(?:\.\./)+Logo_BPRS_BTB\.png"), r"{{ asset('Logo_BPRS_BTB.png') }}"),
    (re.compile(r"(?:\.\./)+Logo_BTB\.png"), r"{{ asset('Logo_BTB.png') }}"),
]

files=list(root.glob('Modules/**/Resources/views/**/*.blade.php'))+list(root.glob('resources/views/**/*.blade.php'))
for f in files:
    try:
        s=f.read_text(encoding='utf-8')
    except Exception:
        continue
    orig=s
    for pat,repl in patterns:
        s=pat.sub(repl,s)
    if s!=orig:
        f.write_text(s,encoding='utf-8')
        print(f"Patched: {f}")

print('Done')
