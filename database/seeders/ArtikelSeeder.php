<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // [writer, kategori]
        $artikels = [
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 13],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 14],
            [2, 15],
            [2, 15],
            [2, 15],
            [2, 15],
            [2, 15],
            [2, 15],
            [2, 15],
            [2, 15],
        ];

        foreach( $artikels as $key => $val ){

            DB::table('artikels')->insert([
                "slug" => "ini-judul-artikel-$key",
                "judul" => "Ini Judul - Artikel $key",
                "judul_en" => "Ini judul - En Artikel $key",
                "gambar" => "artikel/sample.png",
                "isi" => "<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet.</p>",
                "isi_en" => "<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en </p>",
                "user_writer_id" => $val[0],
                "kategori_id" => $val[1],
                "status_aktivasi" => round(rand(0,1)) ? "aktif" : ( round(rand(0,1)) ? "ditolak" : "tidak aktif"),
                "created_at" => "2022-02-01 00:00:0$key",
                "updated_at" => "2022-02-01 00:01:0$key"
            ]);

        }

        // DB::table('artikels')->insert([
        //     'slug' => 'ini-judul-user-a',
        //     'judul' => 'Ini Judul - User A',
        //     'judul_en' => 'Ini judul - En',
        //     'isi' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. </p>',
        //     'isi_en' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en </p>',
        //     'user_writer_id' => 2,
        //     'kategori_id' => 1
        // ]);
        // DB::table('artikels')->insert([
        //     'slug' => 'ini-judul-2-user-a',
        //     'judul' => 'Ini Judul 2 - User A',
        //     'judul_en' => 'Ini judul 2 - En',
        //     'isi' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. </p>',
        //     'isi_en' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en </p>',
        //     'user_writer_id' => 2,
        //     'kategori_id' => 1
        // ]);
        // DB::table('artikels')->insert([
        //     'slug' => 'ini-judul-user-b',
        //     'judul' => 'Ini Judul - User B',
        //     'judul_en' => 'Ini judul - En',
        //     'isi' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. </p>',
        //     'isi_en' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en </p>',
        //     'user_writer_id' => 3,
        //     'kategori_id' => 1
        // ]);
        DB::table('artikels')->insert([
            'slug' => 'ini-judul-user-b',
            'judul' => 'Ini Judul - User B',
            'judul_en' => 'Ini judul - En',
            "gambar" => "artikel/sample.png",
            "status_aktivasi" => "ditolak",
            'isi' => '<p><p data-adtags-visited="true">Ilmu pengetahuan sangat penting ba </p>gi
            kehidupan bak untuk manusia, lingkungan ataupun makhluk hidup &nbsp;lainnya
            di alam semesta ini. Ilmu pengetahuan terus berkembang mengikuti pola
            pikir manusia yang dituntut untuk terus maju sesuai dengan kondisi
            lingkungan yang selalu berubah-ubah dan mengharuskan manusia untuk
            beradaptasi dengan berbagai perubahan tersebut.</p>
            <p data-adtags-visited="true">Fisika adalah ilmu pengetahuan alam yang
            menjelaskan gejala-gejala alam segingga dapat dijelaskan secara
            kuantitatif ,ilmu yang mempelajari semua aspek alam
            merumuskannya,sehingga dapat dikenali secara kuantitatif. Dengan belajar
             Fisika,manusia akan mengetahui dan memahami fenomena alam semesta dan
            kemudian menganalisis, mengolah dan memanfaatkannya secara arif dan
            bijaksana dalam kehidupan.</p>
            <p data-adtags-visited="true">Fisika merupakan salah satu ilmu yang
            mendasari perkembangan teknologi maju dan konsep hidup harmonis dengan
            alam. Perembangan pesat di bidang teknologi informasi dan komunikasi
            dewasa ini dipicu oleh temuan di bidang fisika material melalui
            pertemuan piranti mikroelektronika yang mampu memuat banyak informasi
            sangat kecil. Itulah awal dari perkembangan teknologi yang nantinya
            bermanfaat bagi manusia.</p>
            <p data-adtags-visited="true">Namun kenyataan itu tidak sejalan dengan
            minat pelajar dalam pelajaran Fisika. Banyak diantara mereka yang
            mengaku tidak menyukai fisika dengan alasan rumus banyak, sulit, harus
            menghafal rumus, memahami konsep yang rumit dsb. Hal itu terbukti dengan
             banyaknya nilai siswa yang jelek pada pelajaran fisika. Contohnya
            adalah disekolah saya, banyak teman-teman saya yang tidak suka dan
            selalu pasrah apabila ada ulangan fisika. Sebenarnya mereka tahu dan
            bisa , namun karena mereka telah tersugesti akan ketidakbisaannya , maka
             mereka menjadi malas untuk mempelajarinya, mereka merasa bahwa mamahami
             rumus itu sangat sulit, apalagi mengerjakan soal-soal nya.</p>
            <p data-adtags-visited="true">Oleh karena itu diperlukan kiat-kiat
            bagaimana mengubah paradigma siswa terhadap mata pelajaran fisika yang
            dianggap sulit ini . Bagaimana cara mgningkatkan minat mereka terhadap
            fisika dan bagaimana cara belajar fisika dengan mudah.&nbsp;</p>
            <p data-adtags-visited="true">Pelajaran fisika seringkali menjadi
            pelajaran yang menakutkan dan membosankan bagi para siswa khususnya
            mereka yang dirasa kurang mempunyai salah satu kecerdasan yaitu
            kecerdasan logis-matematis.Ada yang beranggapan bahwa fisika itu tidak
            penting. Ada anggapan juga yang mengatakan bahwa fisika itu misteri,
            bagi yang bisa mengerjakannya akan merasa bangga, senang, dan lega. Tapi
             bagi yang tidak bisa menyelesaikannya akan merasa sedih, pusing,
            stress, dan ada yang mengganjal di otaknya. Ada pula yang menganggap
            bahwa fisika itu menyenangkan. Tidak mudah, tetapi menyenangkan.
            Meskipun fisika dipenuhi oleh rumus-rumus dan teori yang memusingkan,
            jujur dari saya sendiri pun demikian. Kesenangan ini didapat pada saat
            seseorang dapat menjawab pertanyaan fisika, ia akan merasa bangga dan
            akan merasa lebih bangga apa bila tingkat kesulitan soal tersebut sangat
             tinggi. Atau kesenangan ini diperoleh dengan kekaguman
            fenomena-fenomena yang terjadi di alam maupun teknologi yang dinikmati
            manusia dalam membantu pekerjaan manusia ini yang hanya dapat dijelaskan
             oleh fisika.</p>
            <p data-adtags-visited="true">Tugas
             dari para pendidik fisika dan masyarakat yang berkecimpung dalam fisika
             untuk mengubah paradigma ini. Mengubah bahwa fisika itu mudah dan
            penting untuk di pelajari. Bahwa fisika itu sangat berkaitan dengan
            teknologi yang kita gunakan sehari-hari Guru harus dapat menanamkan
            sikap positif dalam diri siswa terhadap pelajaran fisika dan mengatakan
            bahwa fisikaitu mudahdan menyenangkan karena berbagai konsep fisika bisa
             didapatkan dari pengalaman sehari-hari maka niscaya para siswa akan
            percaya diri dan tenang serta selalu sadar bahwa mereka harus belajar
            dan memahami konsep yang diajarkan dalam fisika. Memang itu tidak mudah ,
             namun itu tetap bisa dilakukan dari hal kecil seperti guru jangan
            mengatakan bahwa fisika itu sulit, guru selalu memotivasi siswa untuk
            bisa, guru hendaknya senantiasa mengarahkan siswa bagimana cara
            mengerjakan fisika dengan mudah, dan guru selalu membujuk siswa untuk
            maju kedepan mengerjakan soal di papan tulis. Membujuk disini ialah agar
             siswa berani dan tidak ragu-ragu bahwa sebenarnya ia bisa, bahkan guru
            yang baik hendaknya mengatakan kalau salah tidak apa-apa , nanti pasti
            akan diajari dan diarahkan, itulah yang dapat membuat paradigma siswa
            berubah dan menganggap fisika itu menyenangkan melalui belajar
            interaktif dan komunikatif, dengan paradigmayang berubah , maka dapat
            meningkatkan minat siswa terhadap pelajaran Fisika dan menganggap fisika
             bukanlah pelajaran yang ditakuti.</p>
            <p>Tenaga Pendidik hendaknya juga memberikan cara atau trik untuk
            membuat siswanya menjadi senang saat belajar fisika, yaitu dengan
            belajar Fisika efektif dan mudah, diantaranya :</p>
            <p>Ubah paradigma terhadap fisika bahwa fisika itu sulit , itu merupakan kunci utama seperti yang dijelaskan sebelumnya.</p>
            <p>Pahami terlebih dahulu materi bahasan, memahami relasi antar materi
            bahasan akan membuat kita menjadi paham dan tidak terkesan bingung akan
            apa yang kita baca.</p>
            <p>Jangan hafalkan rumus, tapi pahami darimana rumus itu berasal</p>
            <p>Perbanyak latihan Soal</p>
            <p>Jangan malu untuk bertanya jika mengalami kesulitan</p>
            <p>Jangan &nbsp;takut salah, dan jangan takut mencoba menerjakan soal-soal
            sulit karena itu akan membuat pola pikirmu berkembang dan selalu
            mengingat konsep dasar ,Fisika selalu mengembangkan dari konsep dasar
            untuk membuat rumus-rumus berikutnya.<br>
            Jadi, yang paling utama ialah mengubah pandangan terhadap sesuatu yang
            sebelumnya dianggap sulit menjadi sebaliknya akan menjadi sebuah
            motivasi untuk selalu mencoba , motivasi untuk menjadi bisa, motivasi
            untuk menjadi lebih baik. Dengan menganggap fisika itu mudah dan
            menyenangkan , akan membuat siswa menjadi percaya diri dan selalu merasa
             tertantang untuk mengerjakan soal-soal fisika. Perasaan puas dan lega
            adalah cara menunjukan bahwa siswa menyukai pelajaran fisika, mereka
            menganggap fisika sebagai santapan yang akan dilahapnya. Fisika akan
            membuat mereka tahu apa yang sebenarnya ada dan terjadi di alam ini,
            mereka akan terus berusaha tahu dan menemukan cara untuk mengembangkan
            pola pikirnya dari konsep fisika kedalam kehidupan nyata.</p>',
            'isi_en' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en </p>',
            'user_writer_id' => 3,
            'kategori_id' => 1,
            "created_at" => "2022-02-01 01:00:00",
            "updated_at" => "2022-02-01 02:00:00"
        ]);
    }
}
