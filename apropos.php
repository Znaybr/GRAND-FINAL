<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php



require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'dashboard';
require_once 'view_parts/_page_base.php';
//var_dump($_SESSION["langage"]);

$fr = array(
    "A props", "Un peu de moi...",  "Je suis née en Belgique ou j'ai vécu jusqu'en 2012. J'ai travaillé pour une ONG dans plusieurs pays d'afrique. J'ai également parcouru plusieurs pays d'Amérique du sud.",  "Les differnces de culture m'ont toujours attirées, ce qui explique aussi ma formation en Egypte en tant que stage pour mon certificat ou j'ai découvert des manières de travail différentes et aussi avec des matériaux autres.","Ma formation", "", "J'ai fait ma formation à l'école des métiers du Sud-Ouest-de-Montréal.", "J'ai eu la chance de travailler avec des équipements à la fine pointe de la technologie et entourée de personnel qualifié et expérimenté.", "Je remercie tout le corps proffessoral.", "Stage en Égypte", "La beauté se trouve dans la diversité.", "La vie m'a donné la chance de découvrir une école de bijouterie en Egypte. Leurs manières de travailler les matières m'ont vraiment inspirée et m'ont donné envie d'approfondir mes connaissances et de les diversifier.",
    "Démarche artistique", "La transformation guide mon processus créateur ; une matière brute qui se transforme en un élément complexe ; l’évolution des composantes (matériaux) imbriquées à celle des émotions. L’homme change , la matière aussi.", "Longtemps je cherchais mon mode d’expression, je découvris mon confort dans l’imparfait, une zone en constant changement. C’est pourquoi je reproduis des formes simples accompagnées de textures et d’imperfections qui évoluent au fil de créations brutes et imprécises.", "Conceptualiser une idée, chercher la raison d’être d’un projet, passer une idée à travers une matière ; voilà où naît la réflexion dans laquelle sont créés mes pièces. Je me dois de transmettre une information à travers un processus de transformation. L’émotion mue par le désir de comprendre ce processus.", "La recherche de l’esthétisme, par la composition harmonieuse des formes et des couleurs, est la base de mon travail. Tel un architecte, j’assemble les formes pour arriver à l’harmonie du produit fini. Je dessine mes pièces sans me soucier des contraintes techniques et ensuite, je trouve le moyen de les réaliser. Je désire explorer toute autre technique que je trouverais inspirante et ainsi, moins me restreindre dans mes créations.",
    "Matériaux", "J’utilise principalement l’or et l’argent pour leur malléabilité et leur durabilité.
             Le mélange des différents métaux avec la céramique, les perles et/ou les pierres, m’amène aussi à faire une recherche au niveau de la texture, de la forme et de la couleur.", "Métier de joallier", "En tant que bijoutier, joallier, vous êtes amenés à scier, polir, souder des matériaux afin de concevoir des bijoux.", "Sertir des pierres précieuses et fines, tailler, mouler et couler des bijoux, réaliser en petites séries des pièces de bijouterie, ainsi qu’évaluer sommairement la valeur de certains bijoux et par la suite, en assurer la vente.", "En quelques mots, c'est un métier merveilleux de part sa diversité, sa beauté...",
);
$en = array("About", "A little bit of me", "I was born in Belgium where I lived until 2012, in August of that year I took a big decision; I decided to move to Montreal, Canada.  One of my passions is to travel. I had many opportunities to participate in humanitarian trips in various countries such as Africa and also in South America.  The differences in cultures have always been for me a source of inspiration. Diversity and cultures have always attracted me.  When the time came to do my internship to complete my certificate in Jewelry, I decided to go to Egypt. An amazing country, there I learned new technics and had to chance to work with deferent materials.", "The differnces culture have always attracted me , which also explains my training in Egypt as an internship for my certificate, I found different ways of working and also with other materials.", "Education", "", "I fallowed my formation at the school École des Métiers du South-West-of-Montreal.", " It gave me
the opportunity to work with the best equipment and to be surrounded by the most qualified personnel.", "I thank all the teaching staff that helped me achieve my goal.", "Internship in Egypt", "Beauty lies in diversity.", "Life gave me the opportunity to discover a jewelry school in Egypt. Their ways of working the material has really inspired me and gave me the desire to deepen my knowledge and diversify.", "Artistic approach", "It is transformation that guides my creative process; a raw material which becomes a complex
element; changing components (materials) nested by emotions.", "For a long time I was looking for my mode of expression, I found my comfort in the imperfect, a zone in constant changes. That is why I reproduce simple shapes accompanied by textures and imperfections that evolves with a crude creation and imprecise.", "Conceptualize an idea, find the reason for a project, transfer an idea through material, It is from
this reflexion that my pieces are created. I must transmit information through a transformation process. The emotion is driven by the desire to understand this process.", "The search for beauty, the harmonious composition of shapes and colors is the basis of my
work. Like the architect, I assemble shapes to obtain harmony in the finished product. I design my pieces without worrying about technical limitations and then I find a way to create them. I wish to explore other techniques that I would find inspiring and less restriction in my creations.", "Material", "I mainly use gold and silver for their malleability and durability. The mixture of different metals
with ceramics, beads and / or stones, also leads me to do a search on texture, shape and color.", "The art of Jewelry", "As a jeweler, you need to do some sawing, polishing, welding of materials, to design jewelry.
Crimp precious stones, carve, mold and cast jewelry, produce small series of pieces of jewelry, and evaluate some jewelry and thereafter ensure the sale.", "Set precious and precious stones, carving , molding and casting jewelry, produce small series of pieces of jewelry , and assess briefly the value of some jewelry and thereafter ensure the sale.", "In short, this is a wonderful profession because of its diversity and its beauty…",);

if ($_SESSION["langage"] == 'en') {
    $fr = $en;
}
?>
<div id="apropos">
 <fieldset>
    <legend><?php echo $fr['0']?></legend>
     <div id="moi">
         <h2><?php echo $fr['1']?></h2>
         <p><?php echo $fr['2']?></p>
         <p><?php echo $fr['3']?></p>
     </div>
     <div id="ecole">
         <h2><?php echo $fr['4']?></h2>
         <p><?php echo $fr['5']?></p>
         <p><?php echo $fr['6']?></p>
         <p><?php echo $fr['7']?></p>
         <p><?php echo $fr['8']?></p>
     </div>
         <div id="stage">
             <h2><?php echo $fr['9']?></h2>
              <img src="images/stage1.jpg" alt="stage en égypte"/>
             <img src="images/stage2.jpg" alt="Les bijous d'égypte"/>
             <img src="images/stage3.jpg" alt="école de bijouterie"/>
             <p><?php echo $fr['10']?></p>
             <p><?php echo $fr['11']?></p>

         </div>
    <div id="demarche">
        <h2><?php echo $fr['12']?></h2>
        <p><?php echo $fr['13']?></p>
        <p><?php echo $fr['14']?></p>
        <p><?php echo $fr['15']?></p>
        <p><?php echo $fr['16']?></p>
    </div>
     <div id="materiaux">
         <h2><?php echo $fr['17']?></h2>
         <p><?php echo $fr['18']?></p>
     </div>
     <div id="metjoallier">
         <h2><?php echo $fr['19']?></h2>
         <p><?php echo $fr['20']?></p>
         <p><?php echo $fr['21']?></p>
         <p><?php echo $fr['22']?></p>
     </div>

 </fieldset>
</div>


<?php
require_once 'view_parts/_page_buttom.php';
?>