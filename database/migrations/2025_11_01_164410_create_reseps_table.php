public function up()
{
    Schema::create('reseps', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('bahan');
        $table->text('langkah');
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
}