<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php



require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'dashboard';
require_once 'view_parts/_page_base.php';
//var_dump($_SESSION["langage"]);

$fr = array(
    "A props", "Un peu de moi...",  "Je suis originaire de la Belgique et j'habite Montréal depuis 2012. J'ai participé à des voyages humanitaires dans plusieurs pays d'afrique. J'ai également parcouru plusieurs pays d'Amérique du sud.",  ".Les differnces de culture m'ont toujours attirées, ce qui explique aussi ma formation en Egypte en tant que stage pour mon certificat ou j'ai découvert des manières de travail différentes et aussi avec des matériaux autres.","Ma formation", "", "J'ai fait ma formation à l'école des métiers du Sud-Ouest-de-Montréal.", "J'ai eu la chance de travailler avec des équipements à la fine pointe de la technologie et entourée de personnel qualifié et expérimenté.", "Je remercie tout le corps proffessoral.", "Stage en Égypte", "La beauté se trouve dans la diversité.", "La vie m'a donné la chance de découvrir une école de bijouterie en Egypte. Leurs manières de travailler les matières m'ont vraiment inspirée et m'ont donné envie d'approfondir mes connaissances et de les diversifier.",
    "Démarche artistique", "La transformation guide mon processus créateur ; une matière brute qui se transforme en un élément complexe ; l’évolution des composantes (matériaux) imbriquées à celle des émotions. L’homme change , la matière aussi.", "Longtemps je cherchais mon mode d’expression, je découvris mon confort dans l’imparfait, une zone en constant changement. C’est pourquoi je reproduis des formes simples accompagnées de textures et d’imperfections qui évoluent au fil de créations brutes et imprécises.", "Conceptualiser une idée, chercher la raison d’être d’un projet, passer une idée à travers une matière ; voilà où naît la réflexion dans laquelle sont créés mes pièces. Je me dois de transmettre une information à travers un processus de transformation. L’émotion mue par le désir de comprendre ce processus.", "La recherche de l’esthétisme, par la composition harmonieuse des formes et des couleurs, est la base de mon travail. Tel un architecte, j’assemble les formes pour arriver à l’harmonie du produit fini. Je dessine mes pièces sans me soucier des contraintes techniques et ensuite, je trouve le moyen de les réaliser. Je désire explorer toute autre technique que je trouverais inspirante et ainsi, moins me restreindre dans mes créations.",
    "Matériaux", "J’utilise principalement l’or et l’argent pour leur malléabilité et leur durabilité.
             Le mélange des différents métaux avec la céramique, les perles et/ou les pierres, m’amène aussi à faire une recherche au niveau de la texture, de la forme et de la couleur.", "Métier de joallier", "En tant que bijoutier, joallier, vous êtes amenés à scier, polir, souder des matériaux afin de concevoir des bijoux.", "Sertir des pierres précieuses et fines, tailler, mouler et couler des bijoux, réaliser en petites séries des pièces de bijouterie, ainsi qu’évaluer sommairement la valeur de certains bijoux et par la suite, en assurer la vente.", "En quelques mots, c'est un métier merveilleux de part sa diversité, sa beauté...",
);
$en = array("About", "
A little bit of me", "I'm from Belgium and I live in Montreal since 2012. I have participated in several humanitarian trips in african countries . I also visited several countries in South America.", "The differnces culture have always attracted me , which also explains my training in Egypt as an internship for my certificate, I found different ways of working and also with other materials.", "My formation", "", "I did my training at school of métiers du Sud-Ouest-de-Montréal.", "I have been fortunate to work with equipment at the cutting edge of technology and surrounded by skilled and experienced personnel .",
"I thank all the teachers", "Internship in Egypt", "Beauty lies in diversity.", "
Life gave me the opportunity to discover a jewelry school in Egypt. Their ways of working the material has really inspired me and gave me desire to deepen my knowledge and diversify .", "Artistic approach", "The transformation guide my creative process ; a raw material which becomes a complex member; changing components (materials) that nested emotions. Man changes, the material also .", "Longtemps je cherchais mon mode d’expression, je découvris mon confort dans l’imparfait, une zone en constant changement. C’est pourquoi je reproduis des formes simples accompagnées de textures et d’imperfections qui évoluent au fil de créations brutes et imprécises.", "Conceptualize an idea, look for the rationale of a project, an idea pass through a material ; this is where reflection comes in which is created my pieces . I must transmit information through a transformation process. The emotion driven by the desire to understand this process.", "The search of beauty , by the harmonious composition of shapes and colors is the basis of my work. As an architect , I put the shapes to achieve the harmony of the finished product. I design my pieces without worrying about technical limitations and then I find a way to realize them. I want to explore other techniques that I find inspiring and thus less restrict me in my creations .
", "Materials", "I mainly use gold and silver to their malleability and durability.
             The mixture of different metals with ceramics , beads and / or stones , also leads me to do a search at the texture , shape and color .", "jewelry designer", "As a jeweler, jeweler , you are led sawing , polishing, welding materials to design jewelry.", "Set precious and precious stones, carving , molding and casting jewelry, produce small series of pieces of jewelry , and assess briefly the value of some jewelry and thereafter ensure the sale.", "In short, this is a wonderful profession because of its diversity , its beauty ...",);

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