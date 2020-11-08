<?php

namespace Database\Seeders\tests\Unit\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new \SplFileObject(database_path('seeders/csvs/Unit/User/users.csv'));
        $file->setFlags(
            \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
        );


        foreach ($file as $i => $line) {
            //先頭行を読み飛ばす
            if ($i === 0) continue;

            $list[] = [
                "name" => $line[1],
                "email" => $line[2],
                "password" => $line[4]
            ];
        }

        DB::table('users')->insert($list);
    }
}
