<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Text;

class CreateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('text')->nullable();
            $table->timestamps();
        });

        $items = [
            'Wie zijn wij?' => "who-are-we-text",
            'Fotogalerij' => 'picture-gallery-text',
            'Heeft u vragen?' => 'any-questions-text',
            'Historie' => 'history-text',
            'Kleding' => 'clothing-text',
            'Bestuur' => 'management-text',
            'Vaandel' => 'flag-text',
            'Contact' => 'contact-text',
            'footer instagram link' => 'footer-ig-link',
            'footer facebook link' => 'footer-fb-link',
            'footer twitter link' => 'footer-twtr-link',
            'footer' => 'footer-text',
            'Contact Email' => 'contact-email',
        ];

        foreach($items as $name=>$slug) {
            Text::create([
                'slug' => $slug,
                'name' => $name,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text');
    }
}
