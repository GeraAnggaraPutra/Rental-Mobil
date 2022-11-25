<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample contact
        $contact = new \App\Models\Contact();
        $contact->name = "Gera Anggara";
        $contact->email = "anggaragera@gmail.com";
        $contact->subject = "Developer";
        $contact->message = "Nicee Websitee";
        $contact->save();
        
        $contact = new \App\Models\Contact();
        $contact->name = "Alex";
        $contact->email = "Alex@gmail.com";
        $contact->subject = "-";
        $contact->message = "Lorem ipsum dolor sit amet. Et fuga voluptates vel repellat dolorem nam consequuntur debitis ex velit cumque quo fugiat asperiores qui galisum iure. Ea aliquid libero nam fuga quas ut aperiam excepturi et fuga voluptas.";
        $contact->save();

        $contact = new \App\Models\Contact();
        $contact->name = "Nana";
        $contact->email = "nanabanan@gmail.com";
        $contact->subject = "CEO";
        $contact->message = "Lorem ipsum dolor sit amet. Non ipsa enim sit dolorum magni et tempora quibusdam? Ea sunt dignissimos ut aperiam modi nam consequatur facere vel sequi quam.";
        $contact->save();

        $contact = new \App\Models\Contact();
        $contact->name = "Mark";
        $contact->email = "markfb@gmail.com";
        $contact->subject = "Developer";
        $contact->message = "Lorem ipsum dolor sit amet. Sed totam molestias est dolorem iusto nam sint adipisci. Est consequatur perferendis cum quaerat consequatur qui error molestiae. Ut natus quos in exercitationem libero et molestias rerum hic dolorum nulla.";
        $contact->save();

        $contact = new \App\Models\Contact();
        $contact->name = "Bill Gates";
        $contact->email = "gatefully@gmail.com";
        $contact->subject = "For All";
        $contact->message = "Lorem ipsum dolor sit amet. Est placeat ipsa ea fugiat sunt qui exercitationem harum eos dolorem assumenda. Et nemo neque ut sequi voluptate ut sapiente accusantium. ";
        $contact->save();

    }
}
