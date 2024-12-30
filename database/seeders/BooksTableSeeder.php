<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'The Song of Achilles',
                'author' => 'Madeline Miller',
                'isbn' => '9780062066181',
                'genre' => 'Mythology',
                'language' => 'English',
                'published_year' => 2011,
                'total_copies' => 10,
                'available_copies' => 10,
                'image' => 'TheSongOfAchilles.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 10:31:22',
                'status' => '1',
                'summary' => 'Achilles, "the best of all the Greeks," 
                son of the cruel sea goddess Thetis and the legendary king Peleus, 
                is strong, swift, and beautiful, irresistible to all who meet him. 
                Patroclus is an awkward young prince, exiled from his homeland after an 
                act of shocking violence. Brought together by chance, they forge an inseparable bond, despite risking the gods\' wrath.
                They are trained by the centaur Chiron in the arts of war and medicine, but when word comes 
                that Helen of Sparta has been kidnapped, all the heroes of Greece are called upon to lay siege to Troy in her name. 
                Seduced by the promise of a glorious destiny, Achilles joins their cause, and torn between love and fear for his
                friend, Patroclus follows. Little do they know that the cruel Fates will test them both as never before and demand a terrible sacrifice.',
                'physical_description' => 'Hardcover, 370 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'Circe',
                'author' => 'Madeline Miller',
                'isbn' => '9780316556347',
                'genre' => 'Mythology',
                'language' => 'English',
                'published_year' => 2018,
                'total_copies' => 10,
                'available_copies' => 10,
                'image' => 'circe.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 08:04:15',
                'status' => '1',
                'summary' => 'In the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. 
                But Circe is a strange child--neither powerful like her father nor viciously alluring like her mother. 
                Turning to the world of mortals for companionship, she discovers that she does possess power: the power 
                of witchcraft, which can transform rivals into monsters and menace the gods themselves.
                Threatened, Zeus banishes her to a deserted island, where she hones her occult craft, tames wild beasts, 
                and crosses paths with many of the most famous figures in all of mythology, including the Minotaur, 
                Daedalus and his doomed son Icarus, the murderous Medea, and, of course, wily Odysseus.
                But there is danger, too, for a woman who stands alone, and Circe unwittingly draws the wrath of 
                both men and gods, ultimately finding herself pitted against one of the most terrifying and vengeful of the Olympians. 
                To protect what she loves most, Circe must summon all her strength and choose, once and for all, whether she belongs 
                with the gods she is born from or with the mortals she has come to love.',
                'physical_description' => 'Hardcover, 400 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'The Seven Husbands of Evelyn Hugo',
                'author' => 'Taylor Jenkins Reid',
                'isbn' => '9781501161933',
                'genre' => 'Historical Fiction',
                'language' => 'English',
                'published_year' => 2017,
                'total_copies' => 14,
                'available_copies' => 14,
                'image' => 'SevenHusband.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 03:55:43',
                'status' => '1',
                'summary' => 'Aging and reclusive Hollywood movie icon Evelyn Hugo is finally ready to tell the 
                truth about her glamorous and scandalous life. But when she chooses unknown magazine reporter 
                Monique Grant for the job, no one is more astounded than Monique herself. Why her? Why now?
                Monique is not exactly on top of the world. Her husband has left her, and her professional life is
                going nowhere. Regardless of why Evelyn has selected her to write her biography, 
                Monique is determined to use this opportunity to jumpstart her career.
                Summoned to Evelyn’s luxurious apartment, Monique listens in fascination as the actress tells her story. 
                From making her way to Los Angeles in the 1950s to her decision to leave show business in the ‘80s, and, 
                of course, the seven husbands along the way, Evelyn unspools a tale of ruthless ambition, unexpected 
                friendship, and a great forbidden love. Monique begins to feel a very real connection to the legendary 
                star, but as Evelyn’s story nears its conclusion, it becomes clear that her life intersects with Monique’s own in tragic and irreversible ways.',
                'physical_description' => 'Hardcover, 400 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'The Woman in the Window',
                'author' => 'A. J. Finn',
                'isbn' => '9780062678416',
                'genre' => 'Thriller',
                'language' => 'English',
                'published_year' => 2018,
                'total_copies' => 8,
                'available_copies' => 8,
                'image' => 'TheWomanInTheWindow.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 02:57:59',
                'status' => '1',
                'summary' => 'Anna Fox lives alone, a recluse in her New York City home, unable to venture outside. 
                She spends her day drinking wine (maybe too much), 
                watching old movies, recalling happier times . . . and spying on her neighbors.
                Then the Russells move into the house across the way: a father, a mother and their teenage son.
                The perfect family. But when Anna, gazing out her window one night, sees something she shouldn’t, 
                her world begins to crumble and its shocking secrets are laid bare.
                What is real? What is imagined? Who is in danger? Who is in control? In this diabolically 
                gripping thriller, no one—and nothing—is what it seems.',
                'physical_description' => 'Hardcover, 432 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'The Silent Patient',
                'author' => 'Alex Michaelides',
                'isbn' => '9781250301697',
                'genre' => 'Psychological Thriller',
                'language' => 'English',
                'published_year' => 2019,
                'total_copies' => 10,
                'available_copies' => 10,
                'image' => 'TheSilentPatient.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 03:44:08',
                'status' => '1',
                'summary' => 'Alicia Berenson’s life is seemingly perfect. A famous painter married to an in-demand fashion
                 photographer, she lives in a grand house with big windows overlooking a park in one of London’s most desirable areas. 
                 One evening her husband Gabriel returns home late from a fashion shoot, and Alicia shoots him five times in the face, and then never speaks another word.
                 Alicia’s refusal to talk, or give any kind of explanation, turns a domestic tragedy into something far grander, a mystery that 
                 captures the public imagination and casts Alicia into notoriety. The price of her art skyrockets, and she, the silent patient, 
                 is hidden away from the tabloids and spotlight at the Grove, a secure forensic unit in North London.
                 Theo Faber is a criminal psychotherapist who has waited a long time for the opportunity to work with Alicia. His determination 
                 to get her to talk and unravel the mystery of why she shot her husband takes him down a twisting path into his own motivations—a 
                 search for the truth that threatens to consume him....
                 The Silent Patient is a shocking psychological thriller of a woman’s act of violence
                 against her husband—and of the therapist obsessed with uncovering her motive.',
                'physical_description' => 'Hardcover, 336 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'Pretty Girls',
                'author' => 'Karen Slaughter',
                'isbn' => '9780062429075',
                'genre' => 'Thriller',
                'language' => 'English',
                'published_year' => 2015,
                'total_copies' => 7,
                'available_copies' => 7,
                'image' => 'PrettyGirls.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Twenty years ago Claire Scott's eldest sister, Julia, went missing. 
                No one knew where she went - no note, no body. It was a mystery that was never 
                solved and it tore her family apart.Now another girl has disappeared, with 
                chilling echoes of the past. And it seems that she might not be the only one.
                Claire is convinced Julia's disappearance is linked.But when she begins to learn 
                the truth about her sister, she is confronted with a shocking discovery, and nothing will ever be the same...",
                'physical_description' => 'Hardcover, 416 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'Lock Every Door',
                'author' => 'Riley Sager',
                'isbn' => '9781524745265',
                'genre' => 'Thriller',
                'language' => 'English',
                'published_year' => 2019,
                'total_copies' => 9,
                'available_copies' => 9,
                'image' => 'lockEveryDoor.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "No visitors. No nights spent away from the apartment. 
                No disturbing the other residents, all of whom are rich or famous or both. 
                These are the only rules for Jules Larsen's new job as an apartment sitter at the 
                Bartholomew, one of Manhattan's most high-profile and mysterious buildings. 
                Recently heartbroken and just plain broke, Jules is taken in by the splendor 
                of her surroundings and accepts the terms, ready to leave her past life behind.
                As she gets to know the residents and staff of the Bartholomew, Jules finds
                herself drawn to fellow apartment sitter Ingrid, who comfortingly, disturbingly 
                reminds her of the sister she lost eight years ago. When Ingrid confides that the 
                Bartholomew is not what it seems and the dark history hidden beneath its gleaming 
                facade is starting to frighten her, Jules brushes it off as a harmless ghost story—
                until the next day, when Ingrid disappears.Searching for the truth about Ingrid's 
                disappearance, Jules digs deeper into the Bartholomew's dark past and into the secrets 
                kept within its walls. Her discovery that Ingrid is not the first apartment sitter to 
                go missing at the Bartholomew pits Jules against the clock as she races to unmask a killer, 
                expose the building's hidden past, and escape the Bartholomew before her temporary status becomes permanent.",
                'physical_description' => 'Hardcover, 368 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'The Butterfly Garden',
                'author' => 'Dot Hutchison',
                'isbn' => '9781460399297',
                'genre' => 'Thriller',
                'language' => 'English',
                'published_year' => 2016,
                'total_copies' => 5,
                'available_copies' => 5,
                'image' => 'TheButterflyGarden.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Near an isolated mansion lies a beautiful garden.
                In this garden grow luscious flowers, shady trees…and a 
                collection of precious “butterflies”—young women who have been 
                kidnapped and intricately tattooed to resemble their namesakes. 
                Overseeing it all is the Gardener, a brutal, twisted man obsessed 
                with capturing and preserving his lovely specimens.When the garden is 
                discovered, a survivor is brought in for questioning. FBI agents Victor 
                Hanoverian and Brandon Eddison are tasked with piecing together one of 
                the most stomach-churning cases of their careers. But the girl, known 
                only as Maya, proves to be a puzzle herself.As her story twists and 
                turns, slowly shedding light on life in the Butterfly Garden, Maya reveals 
                old grudges, new saviors, and horrific tales of a man who’d go to any length to 
                hold beauty captive. But the more she shares, the more the agents have to wonder what she’s still hiding...",
                'physical_description' => 'Hardcover, 336 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'Fourth Wing',
                'author' => 'Rebecca Yarros',
                'isbn' => '9781635570130',
                'genre' => 'Romantic Fiction',
                'language' => 'English',
                'published_year' => 2023,
                'total_copies' => 11,
                'available_copies' => 11,
                'image' => 'FourthWing.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Enter the brutal and elite world of a war college for dragon riders...

                Twenty-year-old Violet Sorrengail was supposed to enter the Scribe Quadrant, 
                living a quiet life among books and history. Now, the commanding general—also 
                known as her tough-as-talons mother—has ordered Violet to join the hundreds of 
                candidates striving to become the elite of Navarre: dragon riders.
                But when you’re smaller than everyone else and your body is brittle, death is 
                only a heartbeat away...because dragons don’t bond to “fragile” humans. They incinerate them.
                With fewer dragons willing to bond than cadets, most would kill Violet to better 
                their own chances of success. The rest would kill her just for being her mother’s 
                daughter—like Xaden Riorson, the most powerful and ruthless wingleader in the Riders Quadrant.
                She’ll need every edge her wits can give her just to see the next sunrise.
                Yet, with every day that passes, the war outside grows more deadly, the kingdom's 
                protective wards are failing, and the death toll continues to rise. Even worse, Violet 
                begins to suspect leadership is hiding a terrible secret.
                Friends, enemies, lovers. Everyone at Basgiath War College has an 
                agenda—because once you enter, there are only two ways out: graduate or die.",
                'physical_description' => 'Hardcover, 400 pages.',
                'other_title' => null,
            ],
            [
                 'title' => 'Twisted Love',
                'author' => 'Ana Huang',
                'isbn' => '9781950357762',
                'genre' => 'Romance',
                'language' => 'English',
                'published_year' => 2021,
                'total_copies' => 8,
                'available_copies' => 7,
                'image' => 'twistedLove.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-30 08:04:40',
                'status' => '1',
                'summary' => "Ava Chen is a free spirit trapped by nightmares of a childhood she can't remember.
                But despite her broken past, she's never stopped seeing the beauty in the world...including the heart beneath the icy exterior of a man she shouldn't want.
                Her brother's best friend.
                Her neighbor.
                Her savior and her downfall.
                Theirs is a love that was never supposed to happen-but when it does, it unleashes secrets that could destroy them both...and everything they hold dear.
                Twisted Love is a contemporary brother's best friend/grumpy sunshine romance. It's book one in the Twisted series but can be read as a standalone.",
                'physical_description' => 'Hardcover, 336 pages.',
                'other_title' => null,
            ],
            [
                'title' => 'Twisted Games',
                'author' => 'Ana Huang',
                'isbn' => '9781950357793',
                'genre' => 'Romance',
                'language' => 'English',
                'published_year' => 2021,
                'total_copies' => 11,
                'available_copies' => 11,
                'image' => 'twistedGame.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Regal, strong-willed, and bound by the chains of duty, Princess Bridget dreams of the freedom to live and love as she chooses.
                But when her brother abdicates, she's suddenly faced with the prospect of a loveless, politically expedient marriage and a throne she never wanted.
                And as she navigates the intricacies-and treacheries-of her new role, she must also hide her desire for a man she can't have.
                Her bodyguard.
                Her protector.
                Her ultimate ruin.
                Unexpected and forbidden, theirs is a love that could destroy a kingdom...and doom them both.
                Do not become emotionally involved. Ever.",
                'physical_description' => 'Hardcover, 356 pages.',
                'other_title' => null,
            ],
            [
                 'title' => 'Twisted Hate',
                'author' => 'Ana Huang',
                'isbn' => '9781950357816',
                'genre' => 'Romance',
                'language' => 'English',
                'published_year' => 2022,
                'total_copies' => 13,
                'available_copies' => 13,
                'image' => 'twistedHate.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Outgoing and ambitious, Jules Ambrose is a former party girl who’s focused on one thing: passing the attorney’s bar exam.
                The last thing she needs is to get involved with a doctor who puts the SUFFER in insufferable… no matter how good-looking he is.
                But the more she gets to know him, the more she realizes there’s more than meets the eye to the man she’s hated for so long.
                Her best friend’s brother.
                Her nemesis.
                And her only salvation.",
                'physical_description' => 'Hardcover, 389 pages.',
                'other_title' => null,
            ],
            [
                 'title' => 'Twisted Lies',
                'author' => 'Ana Huang',
                'isbn' => '9781950357830',
                'genre' => 'Romance',
                'language' => 'English',
                'published_year' => 2022,
                'total_copies' => 15,
                'available_copies' => 15,
                'image' => 'twistedLies.jpg',
                'created_at' => '2024-12-29 20:26:00',
                'updated_at' => '2024-12-29 20:26:00',
                'status' => '1',
                'summary' => "Sweet, shy, and introverted despite her social media fame, Stella Alonso is a romantic who keeps her heart in a cage.
                Between her two jobs, she has little time or desire for a relationship.
                But when a threat from her past drives her into the arms―and house―of the most 
                dangerous man she's ever met, she's tempted to let herself feel something for the first time in a long time.
                Because despite Christian's cold nature, he makes her feel everything when she's with him.
                Passionate.
                Protected.
                Truly wanted.
                Theirs is a love twisted with secrets and tainted by lies…and when the truths are finally revealed, they could shatter everything.",
                'physical_description' => 'Hardcover, 406 pages.',
                'other_title' => null,
            ],

        ]);
    }
}
