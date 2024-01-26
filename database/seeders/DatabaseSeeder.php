<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Departemen;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $User = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];
        DB::table('users')->insert($User);
        

        $Dept = [
            [
                'kode_dept' => 'KS',
                'nama_dept' => 'Kepala Sekolah',
            ],
            [
                'kode_dept' => 'GR',
                'nama_dept' => 'Guru',
            ],
            [
                'kode_dept' => 'SS',
                'nama_dept' => 'Staff',
            ],
        ];
        DB::table('departemen')->insert($Dept);

        $Karyawan = [
            [
                'nik' => '90950',
                'nama_lengkap' => 'Oon Hasanah, S.Pd',
                'jabatan' => 'PNS',
                'no_hp' => '089617108899',
                'foto' => '-',
                'kode_dept' => 'KS',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '90320',
                'nama_lengkap' => 'Arismaya Anggraeni, S.Pd',
                'jabatan' => 'PNS',
                'no_hp' => '082316509084',
                'foto' => '-',
                'kode_dept' => 'GR',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '90321',
                'nama_lengkap' => 'Luny Rachmawati, S.Pd',
                'jabatan' => 'PNS',
                'no_hp' => '081966789201',
                'foto' => '-',
                'kode_dept' => 'GR',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '90952',
                'nama_lengkap' => 'Astri, S.Pd',
                'jabatan' => 'Honorer',
                'no_hp' => '081990566672',
                'foto' => '-',
                'kode_dept' => 'GR',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '90156',
                'nama_lengkap' => 'Fitriani, S.Pd',
                'jabatan' => 'Honorer',
                'no_hp' => '085173225692',
                'foto' => '-',
                'kode_dept' => 'SS',
                'password' => Hash::make('12345'),
            ],
        ];
        DB::table('karyawan')->insert($Karyawan);

        //Oon Hasanah
        $Pres = [
            [
                'nik' => '90950',
                'tgl_presensi' => '2024-01-21',
                'jam_in' => '06:55:00',
                'jam_out' => '12:00:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90950',
                'tgl_presensi' => '2024-01-22',
                'jam_in' => '06:57:00',
                'jam_out' => '11:40:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90950',
                'tgl_presensi' => '2024-01-23',
                'jam_in' => '06:50:00',
                'jam_out' => '12:20:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90950',
                'tgl_presensi' => '2024-01-24',
                'jam_in' => '06:53:00',
                'jam_out' => '11:54:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90950',
                'tgl_presensi' => '2024-01-25',
                'jam_in' => '07:01:00',
                'jam_out' => '12:59:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
        ];
        DB::table('presensi')->insert($Pres);

        //Arismaya
        $Pres = [
            [
                'nik' => '90320',
                'tgl_presensi' => '2024-01-21',
                'jam_in' => '07:12:00',
                'jam_out' => '12:00:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90320',
                'tgl_presensi' => '2024-01-22',
                'jam_in' => '06:57:00',
                'jam_out' => '11:50:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90320',
                'tgl_presensi' => '2024-01-23',
                'jam_in' => '07:02:00',
                'jam_out' => '12:05:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            // [
            //     'nik' => '90320',
            //     'tgl_presensi' => '2024-01-24',
            //     'jam_in' => '06:53:00',
            //     'jam_out' => '11:54:00',
            //     'foto_in' => '-',
            //     'foto_out' => '-',
            //     'location' => '-6.8057866, 107.1407496',
            // ],
            [
                'nik' => '90320',
                'tgl_presensi' => '2024-01-25',
                'jam_in' => '07:01:00',
                'jam_out' => '12:59:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
        ];
        DB::table('presensi')->insert($Pres);

        //Luny
        $Pres = [
            [
                'nik' => '90321',
                'tgl_presensi' => '2024-01-21',
                'jam_in' => '07:12:00',
                'jam_out' => '12:00:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90321',
                'tgl_presensi' => '2024-01-22',
                'jam_in' => '06:57:00',
                'jam_out' => '11:50:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            // [
            //     'nik' => '90321',
            //     'tgl_presensi' => '2024-01-23',
            //     'jam_in' => '07:02:00',
            //     'jam_out' => '12:05:00',
            //     'foto_in' => '-',
            //     'foto_out' => '-',
            //     'location' => '-6.8057866, 107.1407496',
            // ],
            [
                'nik' => '90321',
                'tgl_presensi' => '2024-01-24',
                'jam_in' => '06:53:00',
                'jam_out' => '11:54:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90321',
                'tgl_presensi' => '2024-01-25',
                'jam_in' => '06:58:00',
                'jam_out' => '12:59:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
        ];
        DB::table('presensi')->insert($Pres);

        //Astri
        $Pres = [
            [
                'nik' => '90952',
                'tgl_presensi' => '2024-01-21',
                'jam_in' => '07:05:00',
                'jam_out' => '11:42:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90952',
                'tgl_presensi' => '2024-01-22',
                'jam_in' => '06:47:00',
                'jam_out' => '12:02:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90952',
                'tgl_presensi' => '2024-01-23',
                'jam_in' => '06:55:00',
                'jam_out' => '12:05:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90952',
                'tgl_presensi' => '2024-01-24',
                'jam_in' => '07:01:00',
                'jam_out' => '11:44:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90952',
                'tgl_presensi' => '2024-01-25',
                'jam_in' => '07:05:00',
                'jam_out' => '12:36:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
        ];
        DB::table('presensi')->insert($Pres);

        //Fitriani
        $Pres = [
            [
                'nik' => '90156',
                'tgl_presensi' => '2024-01-21',
                'jam_in' => '07:04:00',
                'jam_out' => '11:42:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            // [
            //     'nik' => '90156',
            //     'tgl_presensi' => '2024-01-22',
            //     'jam_in' => '06:48:00',
            //     'jam_out' => '12:12:00',
            //     'foto_in' => '-',
            //     'foto_out' => '-',
            //     'location' => '-6.8057866, 107.1407496',
            // ],
            [
                'nik' => '90156',
                'tgl_presensi' => '2024-01-23',
                'jam_in' => '06:55:00',
                'jam_out' => '12:15:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90156',
                'tgl_presensi' => '2024-01-24',
                'jam_in' => '07:01:00',
                'jam_out' => '11:44:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
            [
                'nik' => '90156',
                'tgl_presensi' => '2024-01-25',
                'jam_in' => '07:05:00',
                'jam_out' => '12:36:00',
                'foto_in' => '-',
                'foto_out' => '-',
                'location' => '-6.8057866, 107.1407496',
            ],
        ];
        DB::table('presensi')->insert($Pres);

        $Izin = [
            [
                'nik' => '90156',
                'tgl_izin' => '2024-01-22',
                'status' => 'i',
                'keterangan' => 'Izin Kepetingan Keluarga',
                'status_approved' => '1',
            ],
            [
                'nik' => '90320',
                'tgl_izin' => '2024-01-24',
                'status' => 's',
                'keterangan' => 'Sakit Lambung',
                'status_approved' => '1',
            ],
            [
                'nik' => '90321',
                'tgl_izin' => '2024-01-23',
                'status' => 'k',
                'keterangan' => 'Izin Keluar Ada Keperluan',
                'status_approved' => '2',
            ],
        ];
        DB::table('izin')->insert($Izin);
    }
}
