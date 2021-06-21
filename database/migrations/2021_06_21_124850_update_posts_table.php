<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Colonna per Foreign Key          // Nullable poichè non forzato ad avere categoria // after per posizionamento

            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // Definizione Foreign Key

            $table->foreign('category_id')
                ->references('id')          // Riferimento
                ->on('categories')         // Tabella
                ->onDelete('set null');     // In caso se una categoria viene cancellata


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Rimozione Relazione (Foreign Key)


                    // ('Nome tabella_NomeForeignKey_foreign(default suffisso)')
            $table->dropForeign('posts_category_id_foreign');   


            // Rimozione Colonna creata

            $table->dropColumn('category_id');
        });
    }
}
