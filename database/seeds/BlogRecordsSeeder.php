<?php

use Illuminate\Database\Seeder;

class BlogRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ['first message', 'hello world in php'],
            ['second message', 'we are here'],
            ['third message', 'no way !'],
            ['fourth message', 'google summer of code'],
            ['fifth message', 'sucks'],
        ];

        $properties = ['subject', 'text'];
        foreach($records as $record) {
            $br = new \App\BlogRecord(array_combine($properties, $record));
            $br->save();
        }
    }
}
