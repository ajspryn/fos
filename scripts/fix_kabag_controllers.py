#!/usr/bin/env python3
"""
Fix Kabag controllers to add pagination and search support.
"""

import re

# Base path
BASE = '/Users/ajspryn/Project/fos/Modules/Kabag/Http/Controllers'

# Controllers to update
# Format: (file, search_relation_or_field, is_simple_nasabah, relation_type)
# is_simple_nasabah = True means simple select()->get() pattern
# relation_type: 'nasabah' = whereHas('nasabah',...), 'nasabahh' = whereHas('nasabahh',...)
# 'pemohon' = whereHas('pemohon',...), 'direct' = direct where on model

controllers = [
    # SKPD
    ('SkpdProposalController.php',   'nasabah',  False, 'nasabah'),
    ('SkpdKomiteController.php',     'nasabah',  False, 'nasabah'),
    ('SkpdNasabahController.php',    'nama_nasabah', True, 'direct'),
    # UMKM
    ('UmkmProposalController.php',   'nasabahh', False, 'nasabahh'),
    ('UmkmKomiteController.php',     'nasabahh', False, 'nasabahh'),
    ('UmkmNasabahController.php',    'nama_nasabah', True, 'direct'),
    # Pasar
    ('PasarProposalController.php',  'nasabahh', False, 'nasabahh'),
    ('PasarKomiteController.php',    'nasabahh', False, 'nasabahh'),
    ('PasarNasabahController.php',   'nama_nasabah', True, 'direct'),
    # PPR
    ('PprProposalController.php',    'pemohon',  False, 'pemohon'),
    ('PprKomiteController.php',      'pemohon',  False, 'pemohon'),
    ('PprNasabahController.php',     'nama_pemohon', True, 'direct'),
    # P3k
    ('P3kProposalController.php',    'p3kPembiayaan.nasabah', False, 'nested'),
    ('P3kKomiteController.php',      'p3kPembiayaan.nasabah', False, 'nested'),
    ('P3kNasabahController.php',     'nama_nasabah', True, 'direct'),
    # UltraMikro
    ('UltraMikroProposalController.php', 'nasabah', False, 'nasabah'),
    ('UltraMikroKomiteController.php',   'nasabah', False, 'nasabah'),
    ('UltraMikroNasabahController.php',  'nama_nasabah', True, 'direct'),
]


def build_when_clause(relation_type, field_or_relation):
    """Build the ->when($search, ...) clause based on relation type."""
    if relation_type == 'direct':
        field = field_or_relation
        return f"->when($search, fn($q) => $q->where('{field}', 'like', \"%{{$search}}%\"))"
    elif relation_type in ('nasabah', 'nasabahh'):
        rel = field_or_relation
        return f"->when($search, fn($q) => $q->whereHas('{rel}', fn($q2) => $q2->where('nama_nasabah', 'like', \"%{{$search}}%\")))"
    elif relation_type == 'pemohon':
        rel = field_or_relation
        return f"->when($search, fn($q) => $q->whereHas('{rel}', fn($q2) => $q2->where('nama_pemohon', 'like', \"%{{$search}}%\")))"
    elif relation_type == 'nested':
        # For P3k: nested relation - search on p3kPembiayaan.nasabah
        return "->when($search, fn($q) => $q->whereHas('p3kPembiayaan', fn($q2) => $q2->whereHas('nasabah', fn($q3) => $q3->where('nama_nasabah', 'like', \"%{{$search}}%\"))))"
    return ''


def fix_controller(filepath, relation_or_field, is_simple, relation_type):
    with open(filepath, 'r') as f:
        content = f.read()

    original = content

    # Step 1: Change `public function index()` to `public function index(Request $request)`
    content = content.replace(
        'public function index()\n    {',
        'public function index(Request $request)\n    {\n        $search = $request->search;'
    )

    if is_simple:
        # Pattern B: simple select()->get()
        # Find the nasabah get() and add paginate
        # Replace: ->get(), at end of simple query
        # This is trickier - we need to find the right ->get()
        # For nasabah controllers, the pattern is usually:
        # 'proposals' => Model::select()->get(),
        # or Model::select()->orderBy('nama_nasabah', 'ASC')->get()
        when_clause = build_when_clause(relation_type, relation_or_field)

        # Replace simple ->get() with ->when->paginate in index method
        # Pattern: Model::select()->get() or Model::select()->orderBy(...)->get()
        content = re.sub(
            r"(Model|NasabahModel|[A-Za-z]+Nasabah[a-z]*|[A-Za-z]+DataPribadi|[A-Za-z]+NasabahController)::select\(\)(->orderBy\([^)]+\))?->get\(\)",
            lambda m: m.group(0).replace('->get()', f'\n            {when_clause}\n            ->paginate(10)->withQueryString()'),
            content
        )

        # Also handle when paginate is on a separate line (just in case)
    else:
        # Pattern A: whereIn + get()
        when_clause = build_when_clause(relation_type, relation_or_field)

        # Replace ->get() after the main query (the one with whereIn)
        # The pattern is usually: ->orderBy('...', 'desc')\n        ->get();
        # We need to add the when clause before paginate
        content = re.sub(
            r'(->orderBy\([^)]+\))\s*\n(\s*)->get\(\)',
            lambda m: f"{m.group(1)}\n{m.group(2)}{when_clause}\n{m.group(2)}->paginate(10)->withQueryString()",
            content
        )

    if content != original:
        with open(filepath, 'w') as f:
            f.write(content)
        print(f"✅ Updated: {filepath.split('/')[-1]}")
    else:
        print(f"⚠️  No change: {filepath.split('/')[-1]}")


for fname, relation, is_simple, rel_type in controllers:
    filepath = f"{BASE}/{fname}"
    try:
        fix_controller(filepath, relation, is_simple, rel_type)
    except FileNotFoundError:
        print(f"❌ Not found: {fname}")
    except Exception as e:
        print(f"❌ Error {fname}: {e}")

print("\nDone!")
