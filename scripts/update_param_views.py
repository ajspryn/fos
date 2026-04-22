#!/usr/bin/env python3
import re, os

# (view_path, route_base, item_var, items_var, fields_for_edit)
views_config = [
    # SKPD views
    ("Modules/Admin/Resources/views/skpd/akad/index.blade.php",
     "/admin/skpd/akad", "akad", "akads",
     [("kode_akad","Kode Akad","text"), ("nama_akad","Nama Akad","text")]),

    ("Modules/Admin/Resources/views/skpd/golongan/index.blade.php",
     "/admin/skpd/golongan", "golongan", "golongans",
     [("kode_golongan","Kode Golongan","number"), ("nama_golongan","Golongan","text")]),

    ("Modules/Admin/Resources/views/skpd/instansi/index.blade.php",
     "/admin/skpd/instansi", "instansi", "instansis",
     [("kode_instansi","Kode Instansi","text"), ("nama_instansi","Nama Instansi","text"), ("alamat_instansi","Alamat","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/skpd/jaminan/index.blade.php",
     "/admin/skpd/jaminan", "jaminan", "jaminans",
     [("kode_jaminan","Kode Jaminan","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/skpd/penggunaan/index.blade.php",
     "/admin/skpd/penggunaan", "penggunaan", "penggunaans",
     [("kode_penggunaan","Kode Penggunaan","text"), ("jenis_penggunaan","Jenis Penggunaan","text")]),

    ("Modules/Admin/Resources/views/skpd/sektor_ekonomi/index.blade.php",
     "/admin/skpd/sektorekonomi", "sektor", "sektors",
     [("kode_sektor_ekonomi","Kode Sektor","text"), ("nama_sektor_ekonomi","Nama Sektor","text")]),

    ("Modules/Admin/Resources/views/skpd/status_perkawinan/index.blade.php",
     "/admin/skpd/statusperkawinan", "statusperkawinan", "statusperkawinans",
     [("kode_status_perkawinan","Kode","text"), ("nama_status_perkawinan","Status Perkawinan","text"), ("biaya","Biaya","number")]),

    ("Modules/Admin/Resources/views/skpd/tanggungan/index.blade.php",
     "/admin/skpd/tanggungan", "tanggungan", "tanggungans",
     [("kode_tanggungan","Kode Tanggungan","text"), ("banyak_tanggungan","Banyak Tanggungan","number"), ("biaya","Biaya","number")]),

    # Pasar views
    ("Modules/Admin/Resources/views/pasar/akad/index.blade.php",
     "/admin/pasar/akad", "akad", "akads",
     [("kode_akad","Kode Akad","text"), ("nama_akad","Nama Akad","text")]),

    ("Modules/Admin/Resources/views/pasar/Jaminan_rumah/index.blade.php",
     "/admin/pasar/jaminanrumah", "rumah", "rumahs",
     [("kode_jaminan","Kode Jaminan","text"), ("nama_jaminan","Nama Jaminan","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/Jenis_Dagang/index.blade.php",
     "/admin/pasar/jenisdagang", "dagang", "dagangs",
     [("kode_jenisdagang","Kode","text"), ("nama_jenisdagang","Jenis Dagang","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/cashpick/index.blade.php",
     "/admin/pasar/cashpickup", "cash", "cashs",
     [("kode_jeniscash","Kode","text"), ("nama_jeniscash","Jenis Cash","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/jaminan_usaha/index.blade.php",
     "/admin/pasar/jaminanusaha", "jaminan", "jaminans",
     [("kode_jaminan","Kode Jaminan","text"), ("nama_jaminan","Nama Jaminan","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/jenis_pasar/index.blade.php",
     "/admin/pasar/jenispasar", "pasar", "pasars",
     [("kode_pasar","Kode","text"), ("nama_pasar","Jenis Pasar","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/jenisnasabah/index.blade.php",
     "/admin/pasar/nasabah", "nasabah", "nasabahs",
     [("kode_jenisnasabah","Kode","text"), ("nama_jenisnasabah","Jenis Nasabah","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/lamadagang/index.blade.php",
     "/admin/pasar/lamadagang", "lama", "lamas",
     [("kode_lamaberdagang","Kode","text"), ("nama_lamaberdagang","Lama Berdagang","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/penggunaan/index.blade.php",
     "/admin/pasar/penggunaan", "penggunaan", "penggunaans",
     [("kode_penggunaan","Kode Penggunaan","text"), ("jenis_penggunaan","Jenis Penggunaan","text")]),

    ("Modules/Admin/Resources/views/pasar/sektor_ekonomi/index.blade.php",
     "/admin/pasar/sektorekonomi", "sektor", "sektors",
     [("kode_sektor_ekonomi","Kode Sektor","text"), ("nama_sektor_ekonomi","Nama Sektor","text")]),

    ("Modules/Admin/Resources/views/pasar/status_perkawinan/index.blade.php",
     "/admin/pasar/statusperkawinan", "statusperkawinan", "statusperkawinans",
     [("kode_status_perkawinan","Kode","text"), ("nama_status_perkawinan","Status Perkawinan","text"), ("biaya","Biaya","number")]),

    ("Modules/Admin/Resources/views/pasar/sukubangsa/index.blade.php",
     "/admin/pasar/sukubangsa", "suku", "sukus",
     [("kode_suku","Kode Suku","text"), ("nama_suku","Suku Bangsa","text"), ("rating","Rating","number"), ("bobot","Bobot","number")]),

    ("Modules/Admin/Resources/views/pasar/tanggungan/index.blade.php",
     "/admin/pasar/tanggungan", "tanggungan", "tanggungans",
     [("kode_tanggungan","Kode Tanggungan","text"), ("bannyak_tanggungan","Banyak Tanggungan","number"), ("biaya","Biaya","number")]),
]


def make_modal_fields(fields, item_var):
    lines = []
    for fname, label, ftype in fields:
        lines.append(
            '                    <div class="mb-3">\n'
            f'                        <label class="form-label">{label}</label>\n'
            f'                        <input type="{ftype}" name="{fname}" class="form-control" value="{{{{ ${item_var}->{fname} }}}}" required>\n'
            '                    </div>'
        )
    return "\n".join(lines)


updated = 0
for (view_path, route_base, item_var, items_var, fields) in views_config:
    if not os.path.exists(view_path):
        print(f"MISSING: {view_path}")
        continue

    content = open(view_path).read()

    # Check if already has Aksi column
    if 'Aksi</th>' in content:
        print(f"SKIP (already updated): {view_path}")
        continue

    # Count existing <th> to determine colspan
    thead_match = re.search(r"<thead>(.*?)</thead>", content, re.DOTALL)
    if not thead_match:
        print(f"No thead: {view_path}")
        continue

    existing_th_count = len(re.findall(r"<th ", thead_match.group(1)))
    new_colspan = existing_th_count + 1

    # 1. Add Aksi <th> after the last existing <th> in thead
    thead_content = thead_match.group(0)
    last_th_pos = thead_content.rfind("</th>")
    new_thead = (
        thead_content[:last_th_pos+5]
        + '\n                                                <th style="text-align: center">Aksi</th>'
        + thead_content[last_th_pos+5:]
    )
    content = content.replace(thead_match.group(0), new_thead, 1)

    # 2. Add action buttons to each data row - insert before </tr> in @forelse block
    forelse_match = re.search(r"(@forelse.*?)(@empty)", content, re.DOTALL)
    if forelse_match:
        forelse_block = forelse_match.group(1)
        last_tr_end = forelse_block.rfind("</tr>")
        if last_tr_end >= 0:
            action_td = (
                "\n"
                "                                                    <td style=\"text-align: center\">\n"
                f"                                                        <button type=\"button\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editModal-{{{{ ${item_var}->id }}}}\">\n"
                "                                                            Edit\n"
                "                                                        </button>\n"
                f"                                                        <form action=\"{route_base}/{{{{ ${item_var}->id }}}}\" method=\"POST\" class=\"d-inline\" onsubmit=\"return confirm('Yakin ingin menghapus data ini?')\">\n"
                "                                                            @csrf\n"
                "                                                            @method('DELETE')\n"
                "                                                            <button type=\"submit\" class=\"btn btn-sm btn-danger\">Hapus</button>\n"
                "                                                        </form>\n"
                "                                                    </td>"
            )
            new_forelse_block = forelse_block[:last_tr_end] + action_td + "\n" + forelse_block[last_tr_end:]
            content = content.replace(forelse_match.group(1), new_forelse_block, 1)

    # 3. Update colspan in @empty section
    content = re.sub(r'(colspan=")[^"]+(")', lambda m: f'{m.group(1)}{new_colspan}{m.group(2)}', content)

    # 4. Fix alert-dismissible
    content = content.replace(
        '<div class="alert alert-success">',
        '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>'
    )
    content = content.replace(
        '<div class="alert alert-danger">',
        '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>'
    )

    # 5. Add Edit modals before @endsection
    modal_fields = make_modal_fields(fields, item_var)
    modals_block = (
        "\n{{-- Edit Modals --}}\n"
        f"@foreach (${items_var} as ${item_var})\n"
        f"<div class=\"modal fade\" id=\"editModal-{{{{ ${item_var}->id }}}}\" tabindex=\"-1\">\n"
        "    <div class=\"modal-dialog\">\n"
        "        <div class=\"modal-content\">\n"
        "            <div class=\"modal-header\">\n"
        "                <h5 class=\"modal-title\">Edit Data</h5>\n"
        "                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>\n"
        "            </div>\n"
        f"            <form action=\"{route_base}/{{{{ ${item_var}->id }}}}\" method=\"POST\">\n"
        "                @csrf\n"
        "                @method('PUT')\n"
        "                <div class=\"modal-body\">\n"
        + modal_fields + "\n"
        "                </div>\n"
        "                <div class=\"modal-footer\">\n"
        "                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Batal</button>\n"
        "                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>\n"
        "                </div>\n"
        "            </form>\n"
        "        </div>\n"
        "    </div>\n"
        "</div>\n"
        "@endforeach\n"
    )

    content = content.replace("\n@endsection", modals_block + "\n@endsection")

    open(view_path, 'w').write(content)
    updated += 1
    print(f"OK {view_path}")

print(f"\nTotal updated: {updated}")
