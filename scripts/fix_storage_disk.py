#!/usr/bin/env python3
"""Fix storage disk bug - change ->store() calls to use 'public' disk"""

import os

base = '/Users/ajspryn/Project/fos'

files_patterns = {
    'Modules/Skpd/Http/Controllers/SkpdKomiteController.php': [
        ("->store('skpd-dokumen_deviasi')", "->store('skpd-dokumen_deviasi', 'public')"),
        ("->store('foto-skpd-pembiayaan')", "->store('foto-skpd-pembiayaan', 'public')"),
    ],
    'Modules/Skpd/Http/Controllers/SkpdRevisiController.php': [
        ("->store('foto-skpd-pembiayaan')", "->store('foto-skpd-pembiayaan', 'public')"),
        ("->store('skpd-sk_pengangkatan')", "->store('skpd-sk_pengangkatan', 'public')"),
        ("->store('skpd-dokumen_keuangan')", "->store('skpd-dokumen_keuangan', 'public')"),
        ("->store('skpd-dokumen_slip_gaji')", "->store('skpd-dokumen_slip_gaji', 'public')"),
        ("->store('skpd-dokumen_jaminan')", "->store('skpd-dokumen_jaminan', 'public')"),
        ("->store('skpd-dokumen_jaminan_lainnya')", "->store('skpd-dokumen_jaminan_lainnya', 'public')"),
    ],
    'Modules/Skpd/Http/Controllers/SkpdController.php': [
        ("->store('skpd-sk_pengangkatan')", "->store('skpd-sk_pengangkatan', 'public')"),
        ("->store('skpd-dokumen_jaminan')", "->store('skpd-dokumen_jaminan', 'public')"),
        ("->store('skpd-dokumen_keuangan')", "->store('skpd-dokumen_keuangan', 'public')"),
        ("->store('skpd-dokumen_slip_gaji')", "->store('skpd-dokumen_slip_gaji', 'public')"),
        ("->store('skpd-dokumen_jaminan_lainnya')", "->store('skpd-dokumen_jaminan_lainnya', 'public')"),
        ("->store('foto-skpd-pembiayaan')", "->store('foto-skpd-pembiayaan', 'public')"),
    ],
    'Modules/Skpd/Http/Controllers/SkpdProposalController.php': [
        ("->store('foto-skpd-pembiayaan')", "->store('foto-skpd-pembiayaan', 'public')"),
    ],
    'Modules/Umkm/Http/Controllers/UmkmRevisiController.php': [
        ("->store('umkm-dokumen-keuangan')", "->store('umkm-dokumen-keuangan', 'public')"),
        ("->store('umkm-dokumen-ktb')", "->store('umkm-dokumen-ktb', 'public')"),
        ("->store('Umkm-dokumen-ktb')", "->store('Umkm-dokumen-ktb', 'public')"),
        ("->store('umkm-dokumen_jaminan')", "->store('umkm-dokumen_jaminan', 'public')"),
        ("->store('foto-umkm-pembiayaan')", "->store('foto-umkm-pembiayaan', 'public')"),
        ("->store('foto-Umkm-pembiayaan')", "->store('foto-Umkm-pembiayaan', 'public')"),
    ],
    'Modules/Umkm/Http/Controllers/UmkmKomiteController.php': [
        ("->store('umkm-dokumen_deviasi')", "->store('umkm-dokumen_deviasi', 'public')"),
        ("->store('foto-umkm-pembiayaan')", "->store('foto-umkm-pembiayaan', 'public')"),
        ("->store('foto-Umkm-pembiayaan')", "->store('foto-Umkm-pembiayaan', 'public')"),
    ],
    'Modules/Umkm/Http/Controllers/UmkmProposalController.php': [
        ("->store('umkm-dokumen-keuangan')", "->store('umkm-dokumen-keuangan', 'public')"),
    ],
}

for filepath, patterns in files_patterns.items():
    full_path = os.path.join(base, filepath)
    with open(full_path, 'r') as f:
        content = f.read()
    changed = 0
    for old, new in patterns:
        count = content.count(old)
        content = content.replace(old, new)
        changed += count
    with open(full_path, 'w') as f:
        f.write(content)
    print(f"{filepath}: {changed} replacement(s)")

print("Done!")
