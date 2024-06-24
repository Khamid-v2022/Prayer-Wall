<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalsInserctsReading extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index() {
		$data['title'] = "Animal and Insect Reading";

        $this->load->view('header_for_tc', $data);
        $this->load->view('overall-animal-insect-reading', $data);
        $this->load->view('footer');
    }

    public function animall($animal_name)
    {
        $data['title'] = "Animals and Insects Reading";
        $data['animal_name'] = ucfirst($animal_name);

        if(!in_array($data['animal_name'], array('Dragonfly', 'Frog', 'Dove', 'Dog', 'Cat', 'Lion', 'Tiger', 'Fox', 'Rabbit', 'Monkey', 'Snake', 'Horse', 'Rooster', 'Pig', 'Butterfly'))) {
        	redirect('/pray/animals-insects-reading/dragonfly');
        	return;
        }
        
        $data['information'] = $this->get_animal_information($data['animal_name']);

        $this->load->view('header_for_tc', $data);
        $this->load->view('animals-insects-reading', $data);
        $this->load->view('footer');
    }

    private function get_animal_information($animal_name) {
    	$information = "";
    	switch($animal_name) {
    		case 'Butterfly':
    			$information = "<h4 class='title'>Butterflies: Symbols of Transformation and Beauty</h4>
    			<p>Butterflies, with their delicate wings and vibrant colors, have long enchanted and inspired humans as symbols of transformation, beauty, and freedom. These ethereal insects, belonging to the order Lepidoptera, have a rich history intertwined with mythology, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as icons of renewal and rebirth, butterflies continue to captivate the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Butterflies have fluttered through the Earth's ecosystems for millions of years, evolving from ancestral insects during the Cretaceous period. Fossil records suggest that butterflies coexisted with dinosaurs, adapting to changing environments and diversifying into thousands of species over time. Today, butterflies are found in diverse habitats, ranging from tropical rainforests and meadows to deserts and urban gardens, showcasing their remarkable adaptability to different ecosystems.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Butterflies are characterized by their slender bodies, four delicate wings, and antennae adorned with sensory organs. They possess intricate patterns and vibrant colors on their wings, which they use for camouflage, communication, and mate attraction. Butterflies undergo a remarkable transformation from egg to caterpillar to pupa to adult, a process known as metamorphosis, which symbolizes growth, renewal, and the cycle of life.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, butterflies have held various cultural meanings and symbolism across different civilizations and societies. In many cultures, butterflies are associated with transformation, rebirth, and the soul's journey. In ancient Greek mythology, the butterfly was believed to represent the soul's journey from life to death and rebirth, symbolizing the eternal cycle of transformation and renewal.<br>
					In Chinese culture, butterflies are symbols of love, joy, and longevity. The butterfly is often depicted in art and literature as a harbinger of happiness and good fortune, particularly in the context of weddings and celebrations. In Native American traditions, butterflies are revered as messengers of the spirit world, carrying messages of guidance, healing, and transformation.
				</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Butterflies are ectothermic insects, meaning they rely on external sources of heat to regulate their body temperature. They bask in the sun to warm up and seek shade to cool down.</li>
    				<li>Butterflies have a specialized feeding structure called a proboscis, which they use to sip nectar from flowers and other sources of liquid nutrition.</li>
    				<li>Some species of butterflies, such as the monarch butterfly, undergo long-distance migrations spanning thousands of miles, traveling from Canada and the United States to Mexico and back.</li>
    				<li>Butterflies engage in a behavior known as puddling, where they gather on moist soil or rocks to extract minerals and nutrients from the substrate.</li>
    			</ul>
    			<p>In conclusion, butterflies are not merely insects; they are symbols of transformation, beauty, and the eternal cycle of life. Their presence spans millions of years, their delicate wings inspire awe, and their symbolism resonates across cultures worldwide. As we embark on the mesmerizing journey of butterflies, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of hope, renewal, and the enduring beauty of the natural world.</p>";
    			break;
			case 'Cat':
				$information = "<h4 class='title'>Exploring the Mysterious World of Cats: Guardians of Grace and Independence</h4>
	    			<p>Cats, with their enigmatic gaze and graceful movements, have captivated human imagination for thousands of years. These fascinating creatures, belonging to the family Felidae, possess a rich history intertwined with myth, symbolism, and companionship. From their ancient origins to their modern roles as beloved pets, cats continue to hold a special place in the hearts and minds of people around the world.</p>
	    			<h5 class='sub-title'>History in Existence:</h5>
	    			<p>Cats have been companions to humans for millennia, with evidence of domestication dating back over 9,000 years to ancient civilizations such as Egypt and Mesopotamia. However, their evolutionary journey traces back millions of years to small carnivorous mammals known as feliforms. Over time, cats have evolved into a diverse array of breeds, each with its own unique characteristics and traits.</p>
	    			<h5 class='sub-title'>Description:</h5>
	    			<p>Cats are characterized by their lithe bodies, sharp claws, and distinctive whiskers. They possess keen senses, including acute hearing, excellent night vision, and a highly developed sense of smell. Cats come in various sizes, colors, and coat patterns, ranging from sleek and slender to fluffy and majestic. Their ability to move with fluid grace and agility has earned them a reputation as skilled hunters and adept climbers.</p>
	    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
	    			<p>
	    				Throughout history, cats have held significant cultural meaning and symbolism across different civilizations and societies. In ancient Egypt, cats were revered as symbols of grace, elegance, and protection. They were associated with the goddess Bastet, who was depicted as a lioness or a woman with the head of a lioness, representing fertility, motherhood, and the power of the sun.
	    				<br>
	    				In Japanese culture, cats are considered symbols of good luck and fortune, particularly the beckoning cat or \"Maneki-neko,\" often depicted with one paw raised in a welcoming gesture. Similarly, in Celtic folklore, cats were believed to possess mystical powers and supernatural abilities, serving as guardians of the spirit world and protectors against evil spirits and malevolent forces.
	    			</p>
	    			<h5 class='sub-title'>Fun Facts:</h5>
	    			<ul>
	    				<li>Cats have a specialized collarbone that allows them to rotate their front limbs freely, enabling them to squeeze through narrow spaces and land gracefully on their feet after a fall, a phenomenon known as the \"righting reflex.\"</li>
	    				<li>The average domestic cat sleeps for around 12 to 16 hours a day, conserving energy for hunting and play.</li>
	    				<li>Cats communicate with humans and other cats through a variety of vocalizations, including purring, meowing, hissing, and chirping.</li>
	    				<li>The Maine Coon is one of the largest domesticated cat breeds, known for its friendly demeanor, tufted ears, and bushy tail.</li>
	    			</ul>
	    			<p>In conclusion, cats are not merely pets; they are guardians of grace, symbols of independence, and companions of mystery. Their presence spans millennia, their elegance inspires awe, and their symbolism resonates across cultures worldwide. As we delve into the mysterious world of cats, we discover not only the secrets of their evolutionary history but also the profound lessons they offer about resilience, adaptability, and the enduring bond between humans and animals.</p>";
				break;
			case 'Dog':
				$information = "<h4 class='title'>The World of Dogs: Companions of Loyalty and Love</h4>
    			<p>Dogs, with their unwavering loyalty and boundless affection, have been cherished companions of humans for thousands of years. These remarkable animals, belonging to the family Canidae, boast a rich history intertwined with human civilization, cultural significance, and diverse roles ranging from hunting partners to beloved family pets. From their ancient origins to their enduring symbolism, dogs continue to hold a special place in the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Dogs are believed to have been domesticated from wolves tens of thousands of years ago, with genetic evidence suggesting that the process may have begun as early as 40,000 years ago. Over time, humans selectively bred dogs for various purposes, resulting in the diverse array of breeds we see today. From herding and guarding livestock to assisting with hunting and providing companionship, dogs have played essential roles in human society throughout history.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Dogs come in a wide range of shapes, sizes, and coat colors, reflecting the immense diversity of breeds developed through selective breeding. They typically possess a keen sense of smell, sharp teeth for capturing prey, and powerful jaws for chewing and tearing. Dogs exhibit remarkable intelligence, adaptability, and communication skills, making them highly trainable and capable of forming strong bonds with their human companions.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Dogs hold various cultural meanings and symbolism across different civilizations and societies. In ancient Egypt, dogs were revered as symbols of loyalty and protection, often depicted alongside gods and pharaohs in artwork and hieroglyphs. Similarly, in Norse mythology, the wolf-like creature Fenrir was believed to symbolize both danger and loyalty, serving as a reminder of the duality of nature.
    			<br>In many cultures, dogs are revered for their unwavering loyalty, steadfast companionship, and selfless devotion to their human owners. They are often associated with qualities such as loyalty, courage, and unconditional love, serving as symbols of friendship, fidelity, and trust. In some religious traditions, dogs are regarded as sacred animals, believed to possess spiritual significance and divine qualities.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>The Basenji, known as the \"barkless dog\" is one of the few dog breeds that do not bark but instead produce a unique yodel-like sound.</li>
    				<li>The Newfoundland breed has webbed feet and a water-resistant coat, making it an excellent swimmer and lifesaver in water rescue operations.</li>
    				<li>The Saluki, an ancient breed originating from the Middle East, is considered one of the oldest known breeds of domesticated dog, dating back over 5,000 years.</li>
    				<li>Dogs have an extraordinary sense of smell, capable of detecting scents up to 100,000 times better than humans, making them invaluable for tasks such as search and rescue, tracking, and detecting explosives and narcotics.</li>
    			</ul>
    			<p>In conclusion, dogs are not merely animals; they are companions of loyalty, symbols of love, and guardians of friendship. Their presence spans millennia, their loyalty inspires awe, and their symbolism resonates across cultures worldwide. As we embark on a journey through the remarkable world of dogs, we discover not only the secrets of their evolutionary history but also the profound lessons they offer about loyalty, compassion, and the enduring bond between humans and animals.</p>";
				break;
			case 'Dove':
				$information = "<h4 class='title'>Exploring the Graceful World of Doves: Messengers of Peace and Serenity</h4>
    			<p>Doves, with their gentle cooing and graceful flight, have long been revered across cultures as symbols of peace, love, and purity. These elegant birds, belonging to the family Columbidae, possess a rich history steeped in mythology, religious significance, and ecological importance. From their ancient origins to their timeless symbolism, doves continue to captivate the human imagination and inspire awe and admiration worldwide.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Doves have been an integral part of human civilization for thousands of years, with archaeological evidence suggesting their domestication as early as 10,000 years ago. Wild doves are native to various regions around the globe, inhabiting diverse habitats ranging from forests and grasslands to urban environments. Their ability to adapt to different landscapes has enabled them to thrive in a wide range of ecosystems, making them one of the most widespread bird species on Earth.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Doves are characterized by their small, compact bodies, slender necks, and soft plumage in shades of white, gray, and beige. Their distinctive features include a small, rounded head, dark eyes encircled by a thin ring of skin, and a short, straight beak ideal for feeding on seeds and grains. Doves are known for their gentle demeanor and melodious cooing, which serves as a form of communication among members of their flock.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Doves hold significant cultural meaning and symbolism across different civilizations and religions. In ancient Mesopotamia, they were associated with the goddess Ishtar, symbolizing love, fertility, and divine protection. Similarly, in Greek mythology, doves were sacred to Aphrodite, the goddess of love and beauty, representing purity, innocence, and eternal devotion.
    			<br>In Christianity, doves are closely linked to the story of Noah's Ark, where a dove carrying an olive branch symbolizes hope, renewal, and peace after the Great Flood. This imagery has since become synonymous with the concept of peace and reconciliation, inspiring countless works of art, literature, and poetry throughout history.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Doves are highly social birds, often forming tight-knit flocks known as \"droves\" or \"duls\"</li>
    				<li>•	Unlike many other bird species, doves produce a special type of milk called \"crop milk\" to feed their young, a nutrient-rich secretion produced in their crop glands.</li>
    				<li>•	Doves are monogamous creatures, forming long-term pair bonds with their mates and often remaining faithful for life.</li>
    				<li>•	The Eurasian collared dove, introduced to North America in the 1980s, has rapidly spread across the continent and is now one of the most common bird species in many urban areas.</li>
    			</ul>
    			<p>In conclusion, doves are not merely birds; they are messengers of peace, symbols of love, and guardians of harmony. Their presence spans centuries, their beauty inspires art, and their symbolism resonates across cultures worldwide. As we delve deeper into the graceful world of doves, we discover not only the secrets of their evolutionary history but also the profound lessons they offer about compassion, forgiveness, and the enduring power of love.</p>";
				break;
			case 'Dragonfly':
				$information = "<h4 class='title'>Introduction to Dragonflies: Guardians of the Air</h4>
    			<p>Dragonflies, with their iridescent wings and agile flight, have captured the human imagination for millennia. These fascinating creatures, belonging to the order Odonata, have a rich history steeped in myth, symbolism, and admiration across various cultures worldwide. From their ancient presence in prehistoric times to their modern role as ecological indicators, dragonflies continue to captivate both scientists and enthusiasts alike.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Dragonflies are ancient insects, dating back over 300 million years to the Carboniferous period. Fossil records indicate that these majestic insects have remained relatively unchanged throughout their evolutionary history, earning them the moniker \"living fossils\". Their resilience and adaptability have allowed them to survive through numerous environmental changes, making them one of the oldest insect orders still in existence today.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Characterized by their elongated bodies, large compound eyes, and four intricately veined wings, dragonflies are true marvels of nature's design. Their striking colors and patterns vary among species, ranging from vibrant blues and greens to fiery reds and oranges. Despite their delicate appearance, dragonflies are formidable predators, employing their sharp mandibles and exceptional aerial agility to hunt down smaller insects mid-flight.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, dragonflies have held significant cultural symbolism across diverse civilizations. In Japanese culture, dragonflies are revered as symbols of courage, strength, and happiness. They are often depicted in art and literature as emblematic of perseverance and transformation, owing to their remarkable life cycle from aquatic nymph to airborne adult.
    			<br>Similarly, Native American tribes associate dragonflies with swiftness and purity of water. They believe these ethereal insects to be messengers of the spirit world, bridging the gap between realms and guiding souls to the afterlife. In European folklore, dragonflies were once feared as sinister creatures, associated with witches and evil spirits. However, over time, they came to symbolize change, adaptability, and renewal, representing the cyclical nature of life.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Dragonflies are expert aerial acrobats, capable of flying in any direction, including backward and sideways, with incredible precision.</li>
    				<li>Despite their large size, dragonflies are remarkably efficient predators, with a success rate of catching prey exceeding 95%.</li>
    				<li>Some species of dragonflies migrate thousands of miles, making them among the longest migratory insects in the world.</li>
    				<li>Dragonflies have incredibly complex eyes, with up to 30,000 individual facets, allowing them to detect motion with exceptional clarity.</li>
    			</ul>
    			<p>In conclusion, dragonflies are not merely insects; they are ambassadors of ancient wisdom, symbols of transformation, and guardians of the air. Their existence spans epochs, their beauty inspires art, and their symbolism resonates across cultures worldwide. As we delve deeper into the mysterious world of dragonflies, we uncover not only the secrets of their past but also the profound lessons they offer about resilience, adaptation, and the interconnectedness of all life on Earth.</p>";
				break;
			case 'Fox':
				$information = "<h4 class='title'>Unraveling the Mysteries of Foxes: Cunning Guardians of the Forest</h4>
    			<p>Foxes, with their sleek fur and piercing eyes, have long captured the imagination of humans as symbols of cunning, adaptability, and mystique. These fascinating creatures, belonging to the family Canidae, possess a rich history steeped in folklore, mythology, and ecological significance. From their ancient origins to their enduring symbolism as elusive tricksters, foxes continue to intrigue and inspire awe in people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Foxes have inhabited various regions of the world for millions of years, evolving from ancestral canids during the Miocene epoch. Fossil records indicate that foxes once had a much broader distribution, with species found in North America, Europe, Asia, and Africa. Today, foxes are found in diverse habitats ranging from forests and grasslands to urban areas, demonstrating their remarkable adaptability to changing environments.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Foxes are characterized by their slender bodies, pointed ears, and bushy tails, which they use for balance and communication. They possess keen senses, including acute hearing and sharp eyesight, which they rely on for hunting and detecting potential threats. Foxes exhibit a wide range of coat colors and patterns, including red, gray, black, and white, providing camouflage in their natural habitats.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, foxes have held various cultural meanings and symbolism across different civilizations and societies. In many Native American cultures, foxes are revered as symbols of wisdom, adaptability, and cunning. They are often depicted in folklore and oral traditions as tricksters and shape-shifters, capable of outsmarting their adversaries through wit and ingenuity.
    			<br>In Japanese folklore, the fox, or \"kitsune\" is a powerful and mystical creature associated with the Shinto deity Inari, the god of rice, fertility, and prosperity. Kitsune are believed to possess magical abilities, including shape-shifting, illusion-casting, and possession, and are often depicted as guardians of shrines and messengers of the divine.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Foxes are omnivorous animals, feeding on a wide variety of prey, including small mammals, birds, insects, fruits, and vegetation.</li>
    				<li>Foxes are highly adaptable and can thrive in diverse environments, from rural farmland to urban cityscapes.</li>
    				<li>Foxes are known for their playful behavior, engaging in activities such as pouncing, chasing, and wrestling with each other, particularly during the breeding season.</li>
    				<li>Some species of foxes, such as the Arctic fox, have developed specialized adaptations to survive in harsh environments, including thick fur, compact bodies, and keen hunting skills.</li>
    			</ul>
    			<p>In conclusion, foxes are not merely animals; they are cunning guardians of the forest, symbols of adaptability, and keepers of ancient wisdom. Their presence spans millennia, their mystique inspires folklore, and their symbolism resonates across cultures worldwide. As we unravel the mysteries of foxes, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as enigmatic creatures of the wild.</p>";
				break;
			case 'Frog':
				$information = "<h4 class='title'>Exploring the Enigmatic World of Frogs: Guardians of the Wetlands</h4>
    			<p>Frogs, with their croaks echoing through wetlands and vibrant colors adorning their skins, have long been both symbols of fascination and key indicators of environmental health. These amphibians, belonging to the order Anura, boast a rich history intertwined with human culture, mythology, and scientific inquiry. From their ancient origins to their diverse cultural significance, frogs hold a special place in the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Frogs have inhabited the Earth for over 200 million years, evolving from ancient amphibians during the Triassic period. Fossil records indicate that their ancestors were among the first vertebrates to venture onto land, marking a pivotal moment in the transition from aquatic to terrestrial life. Despite the passage of millennia, frogs have retained many primitive features, making them valuable subjects for studying evolutionary biology and environmental change.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Frogs display a remarkable diversity of shapes, sizes, and colors, with over 7,000 known species inhabiting a wide range of ecosystems across the globe. These amphibians typically have smooth, moist skin, webbed feet for swimming, and powerful hind legs adapted for leaping. Their bulging eyes provide excellent vision, while their sensitive skin serves as a vital respiratory organ, allowing them to breathe both in water and on land.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, frogs have held various cultural meanings and symbolism across different civilizations. In ancient Egyptian mythology, the frog-headed goddess Heket was revered as a symbol of fertility, childbirth, and rebirth. Similarly, in Hinduism, frogs are associated with rain and fertility, often depicted in art and folklore as harbingers of monsoons and agricultural abundance.
    			<br>In Western folklore, frogs have been linked to transformation and metamorphosis, owing to their extraordinary life cycle from aquatic tadpole to terrestrial adult. They symbolize adaptability, renewal, and the ability to navigate through life's transitions with grace and resilience. Conversely, in some cultures, frogs are viewed as omens of bad luck or misfortune, particularly when their croaking is heard during the night.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Frogs are among the most vocal of all vertebrates, producing a diverse array of calls and croaks to communicate with potential mates and establish territory.</li>
    				<li>Some species of frogs are capable of changing their skin color to blend in with their surroundings, providing camouflage from predators.</li>
    				<li>The golden poison frog, native to Central and South America, is one of the most toxic animals on Earth, with enough poison to kill up to ten humans.</li>
    				<li>The wood frog, found in North America, can survive being frozen solid during the winter months by entering a state of suspended animation.</li>
    			</ul>
    			<p>In conclusion, frogs are not merely amphibians; they are ambassadors of ecological balance, symbols of transformation, and guardians of the wetlands. Their existence predates human civilization, their beauty inspires art, and their symbolism resonates across cultures worldwide. As we immerse ourselves in the mysterious world of frogs, we gain not only a deeper understanding of their evolutionary history but also a profound appreciation for their vital role in maintaining the health and vitality of our planet's ecosystems.</p>";
				break;
			case 'Horse':
				$information = "<h4 class='title'>Unraveling the Magnificent World of Horses: Symbols of Freedom and Grace</h4>
    			<p>Horses, with their powerful muscles and flowing manes, have galloped through the annals of history as symbols of strength, beauty, and companionship. These majestic creatures, belonging to the genus Equus, boast a rich history intertwined with human civilization, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as partners in exploration and adventure, horses continue to captivate the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Horses have been companions to humans for thousands of years, with evidence of domestication dating back over 6,000 years to ancient civilizations such as the Mesopotamians and the Indo-Europeans. However, their evolutionary journey traces back millions of years to small herbivorous mammals known as eohippus. Over time, horses have played essential roles in human society, serving as modes of transportation, sources of labor, and partners in sport and recreation.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Horses are characterized by their strong, muscular bodies, long legs, and flowing mane and tail. They possess keen senses, including acute hearing, sharp eyesight, and a highly developed sense of smell, which they rely on for detecting predators and communicating with other members of their herd. Horses come in a variety of breeds, each with its own unique characteristics and traits, ranging from the compact and sturdy Shetland pony to the elegant and swift Arabian horse.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, horses have held various cultural meanings and symbolism across different civilizations and societies. In many cultures, horses are revered as symbols of freedom, power, and nobility. In Greek mythology, the horse was associated with gods such as Poseidon, the god of the sea, and Helios, the god of the sun, symbolizing strength and vitality. Similarly, in Norse mythology, the horse was believed to be a sacred animal associated with gods such as Odin, the god of war and wisdom.
    			<br>In Chinese culture, horses are symbols of success, prosperity, and endurance. The Chinese zodiac features the horse as one of the twelve animal signs, representing energy, independence, and ambition. In Native American traditions, horses are revered as spiritual guides and allies, embodying the values of freedom, courage, and connection to the natural world.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Horses are herbivorous animals, feeding primarily on grass, hay, and grains, with an average adult horse consuming up to 20 pounds of food per day.</li>
    				<li>Horses are social animals, living in groups called herds or bands, which can consist of several individuals or several hundred, depending on the species and habitat.</li>
    				<li>Horses have a unique digestive system known as hindgut fermentation, which allows them to efficiently break down fibrous plant material and extract nutrients.</li>
    				<li>Horses have a remarkable ability to sleep while standing up, thanks to a specialized system of ligaments and tendons that lock their legs in place.</li>
    			</ul>
    			<p>In conclusion, horses are not merely animals; they are symbols of freedom, grace, and companionship, embodying the enduring bond between humans and the natural world. Their presence spans millennia, their beauty inspires awe, and their symbolism resonates across cultures worldwide. As we unravel the magnificent world of horses, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of adventure, exploration, and the enduring spirit of the open road.</p>";
				break;
			case 'Lion':
				$information = "<h4 class='title'>Roaring into the Kingdom of Lions: Majestic Monarchs of the Savanna</h4>
    			<p>Lions, with their regal mane and commanding presence, have long been revered as symbols of strength, courage, and royalty. These magnificent creatures, belonging to the genus Panthera leo, boast a rich history steeped in myth, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as the kings of the savanna, lions continue to capture the imagination and admiration of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Lions have roamed the plains of Africa and parts of Asia for millions of years, evolving from ancestral felids during the Pleistocene epoch. Fossil records suggest that lions once had a much wider distribution, inhabiting regions as far-reaching as Europe and North America. However, due to habitat loss, human encroachment, and hunting, their range has significantly decreased, leading to their classification as a vulnerable species by the International Union for Conservation of Nature (IUCN).</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Lions are characterized by their muscular build, golden fur, and distinctive mane, which varies in color and length among individuals and serves as a symbol of maturity and dominance among males. They possess powerful jaws, sharp claws, and keen senses, making them formidable predators capable of taking down large prey such as buffalo, zebra, and wildebeest. Lions are social animals, living in groups called prides, which consist of related females and their offspring, as well as one or more dominant males.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, lions have held various cultural meanings and symbolism across different civilizations and societies. In ancient Egypt, lions were revered as symbols of royalty and divine protection, often depicted in art and hieroglyphs alongside pharaohs and gods. The goddess Sekhmet, depicted with the head of a lioness, was associated with war, healing, and justice, embodying the power and ferocity of the lion.
    			<br>In Western cultures, lions have been associated with courage, strength, and nobility, symbolizing leadership and authority. The lion has been adopted as a heraldic symbol by numerous royal families, military units, and organizations, representing valor and sovereignty. In African folklore, lions are revered as symbols of wisdom, cunning, and communal harmony, with stories and proverbs portraying them as both fearsome predators and benevolent guardians of the land.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Lions are the only cats that live in groups, known as prides, consisting of up to 30 individuals.</li>
    				<li>Male lions can roar so loudly that their vocalizations can be heard from a distance of up to 5 miles (8 kilometers).</li>
    				<li>Lions spend the majority of their day resting, conserving energy for short bursts of intense activity during hunting and territorial defense.</li>
    				<li>Lionesses are the primary hunters within the pride, relying on teamwork and coordinated tactics to bring down prey.</li>
    			</ul>
    			<p>In conclusion, lions are not merely animals; they are majestic monarchs of the savanna, symbols of strength, courage, and resilience. Their presence spans millennia, their roar inspires awe, and their symbolism resonates across cultures worldwide. As we explore the kingdom of lions, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as ambassadors of the wild and guardians of the natural world.</p>";
				break;
			case 'Monkey':
				$information = "<h4 class='title'>Exploring the Fascinating World of Monkeys: Symbols of Playfulness and Wisdom</h4>
    			<p>Monkeys, with their agile limbs and expressive faces, have long been captivating creatures in the eyes of humans, symbolizing curiosity, mischief, and intelligence. These primates, belonging to the infraorder Simiiformes, have a rich history steeped in evolutionary significance, cultural symbolism, and ecological importance. From their ancient origins to their enduring presence in mythology and folklore, monkeys continue to inspire wonder and fascination among people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Monkeys have inhabited the Earth for millions of years, evolving from ancestral primates during the Eocene epoch. Fossil records indicate that monkeys once had a much broader distribution, with species found in various regions of the world, including Africa, Asia, Europe, and the Americas. Today, monkeys are found in diverse habitats, ranging from tropical rainforests and savannas to mountainous regions and urban areas, showcasing their remarkable adaptability to different environments.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Monkeys are characterized by their dexterous hands, prehensile tails (in some species), and complex social behaviors. They possess keen senses, including excellent vision and hearing, which they rely on for foraging, communication, and navigating their surroundings. Monkeys come in a variety of sizes, colors, and fur patterns, ranging from the small and colorful pygmy marmoset to the large and imposing mandrill.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, monkeys have held various cultural meanings and symbolism across different civilizations and societies. In many Asian cultures, monkeys are revered as symbols of cleverness, adaptability, and resourcefulness. In Hindu mythology, the monkey god Hanuman is worshipped as a symbol of strength, loyalty, and devotion, with stories and epics depicting his heroic deeds and divine powers.
    			<br>In Chinese folklore, monkeys are associated with mischief and playfulness, particularly the legendary figure Sun Wukong, also known as the Monkey King. Sun Wukong is a central character in the classic Chinese novel \"Journey to the West\" where he embarks on a journey of self-discovery and enlightenment, showcasing his intelligence, bravery, and magical abilities.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Monkeys are highly social animals, living in groups called troops or bands, which can consist of several individuals or several hundred, depending on the species.</li>
    				<li>Monkeys have a diverse diet, feeding on fruits, leaves, insects, and small animals, depending on their habitat and dietary preferences.</li>
    				<li>Some species of monkeys, such as capuchins and macaques, are known for their tool-using abilities, using objects such as sticks and rocks to forage for food or crack open nuts.</li>
    				<li>Monkeys exhibit a wide range of vocalizations, including grunts, screams, and alarm calls, which they use to communicate with each other and coordinate group activities.</li>
    			</ul>
    			<p>In conclusion, monkeys are not merely animals; they are symbols of playfulness, wisdom, and adaptability, embodying the diverse and complex nature of the natural world. Their presence spans millions of years, their intelligence inspires awe, and their symbolism resonates across cultures worldwide. As we explore the fascinating world of monkeys, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of curiosity, mischief, and the enduring spirit of life.</p>";
				break;
			case 'Pig':
				$information = "<h4 class='title'>Discovering the Endearing World of Pigs: Symbols of Prosperity and Intelligence</h4>
    			<p>Pigs, with their curious snouts and gentle demeanor, have long been cherished animals in human society, symbolizing abundance, intelligence, and resourcefulness. These domesticated mammals, belonging to the genus Sus, have a rich history intertwined with human civilization, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as icons of prosperity and good fortune, pigs continue to capture the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Pigs have been companions to humans for thousands of years, with evidence of domestication dating back over 10,000 years to ancient civilizations such as those of Mesopotamia and China. Wild boars, the ancestors of domestic pigs, were first tamed by early humans for their meat, leather, and tusks. Over time, pigs have played essential roles in agriculture, providing sustenance, labor, and companionship to people in various cultures and societies.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Pigs are characterized by their stout bodies, elongated snouts, and distinctive floppy ears. They possess keen senses of smell and hearing, which they rely on for foraging and detecting potential threats. Pigs come in a variety of breeds, each with its own unique color patterns and physical characteristics, ranging from the large and docile Yorkshire to the compact and hardy Vietnamese pot-bellied pig.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, pigs have held various cultural meanings and symbolism across different civilizations and societies. In many cultures, pigs are associated with prosperity, abundance, and good fortune. In Chinese culture, the pig is one of the twelve animals of the Chinese zodiac, symbolizing wealth, fertility, and honesty. People born under the sign of the pig are believed to be kind-hearted, generous, and industrious.
    			<br>In Norse mythology, the boar was associated with the god Freyr, the god of fertility and prosperity, and was often depicted as a symbol of strength and courage. Similarly, in Celtic folklore, pigs were revered as symbols of fertility and abundance, with stories and myths portraying them as guardians of the land and bringers of prosperity.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Pigs are highly intelligent animals, ranking among the most intelligent mammals, alongside dolphins and chimpanzees. They are capable of learning complex tasks and recognizing patterns, making them excellent candidates for training and problem-solving tasks.</li>
    				<li>Pigs are social animals, living in groups called sounders, which can consist of several individuals or several dozen, depending on the species and habitat.</li>
    				<li>Pigs have a remarkable sense of taste, with taste buds covering their entire mouths, allowing them to discern between different flavors and textures of food.</li>
    				<li>Pigs are omnivorous animals, feeding on a wide variety of foods, including roots, fruits, vegetables, insects, and small animals.</li>
    			</ul>
    			<p>In conclusion, pigs are not merely livestock; they are symbols of prosperity, intelligence, and resourcefulness, embodying the spirit of abundance and the potential for growth and success. Their presence spans millennia, their gentle nature inspires affection, and their symbolism resonates across cultures worldwide. As we discover the endearing world of pigs, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of prosperity, intelligence, and the enduring bond between humans and animals.</p>";
				break;
			case 'Rabbit':
				$information = "<h4 class='title'>Exploring the Endearing World of Rabbits: Symbols of Fertility and Renewal</h4>
    			<p>Rabbits, with their soft fur and twitching noses, have long been cherished creatures in the eyes of humans, symbolizing fertility, abundance, and innocence. These small mammals, belonging to the family Leporidae, have a rich history steeped in mythology, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as harbingers of spring, rabbits continue to captivate the hearts and minds of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Rabbits have inhabited the Earth for millions of years, evolving from small herbivorous mammals known as lagomorphs during the Eocene epoch. Fossil records indicate that rabbits once had a much broader distribution, with species found in various regions of the world, including Europe, Asia, Africa, and the Americas. Today, rabbits are found in diverse habitats, ranging from forests and grasslands to deserts and urban areas, demonstrating their remarkable adaptability to different environments.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Rabbits are characterized by their small, compact bodies, long ears, and fluffy tails. They possess strong hind legs adapted for jumping and running, as well as sharp incisors for chewing fibrous vegetation. Rabbits come in a variety of colors and patterns, including white, brown, gray, and black, providing camouflage in their natural habitats. They are known for their rapid reproductive rate, with females capable of producing multiple litters of offspring each year.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, rabbits have held various cultural meanings and symbolism across different civilizations and societies. In many ancient cultures, rabbits were associated with fertility, abundance, and renewal, owing to their prolific breeding habits and the arrival of new life in spring. In Celtic folklore, rabbits were believed to possess magical powers and were associated with the goddess Eostre, the goddess of spring and fertility.
    			<br>In some Native American traditions, rabbits were revered as tricksters and wise teachers, often depicted in stories and myths as clever and resourceful characters who outsmart their adversaries through wit and cunning. In Chinese culture, the rabbit is one of the twelve animals of the Chinese zodiac, symbolizing longevity, prosperity, and harmony.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Rabbits have a unique digestive system that allows them to extract nutrients from tough, fibrous plant material, such as grass and hay.</li>
    				<li>Rabbits have a keen sense of smell and hearing, which they use to detect predators and communicate with other members of their warren.</li>
    				<li>Rabbits engage in a behavior known as \"binkying\" where they leap into the air and twist their bodies, signaling happiness and contentment.</li>
    				<li>The gestation period for rabbits is relatively short, lasting about 28 to 31 days, after which the female gives birth to a litter of young called kits.</li>
    			</ul>
    			<p>In conclusion, rabbits are not merely animals; they are symbols of fertility, abundance, and renewal, embodying the spirit of spring and the cycle of life. Their presence spans millennia, their innocence inspires folklore, and their symbolism resonates across cultures worldwide. As we explore the endearing world of rabbits, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of hope, vitality, and the enduring beauty of nature.</p>";
				break;
			case 'Rooster':
				$information = "<h4 class='title'>Unveiling the Vibrant World of Roosters: Symbols of Dawn and Vigilance</h4>
    			<p>Roosters, with their vibrant plumage and resounding crow, have long been revered as symbols of vitality, courage, and new beginnings. These colorful birds, belonging to the genus Gallus, boast a rich history intertwined with human civilization, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as heralds of the dawn, roosters continue to capture the imagination and admiration of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Roosters, along with their female counterparts, hens, are descendants of wild jungle fowl native to Southeast Asia. They were first domesticated by humans thousands of years ago, with evidence of their presence dating back to ancient civilizations such as those of Mesopotamia and Egypt. Over time, roosters have played essential roles in agriculture, providing eggs, meat, and feathers, as well as serving as symbols of fertility and vitality in various cultural traditions.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Roosters are characterized by their brightly colored plumage, distinctive comb and wattles, and elongated tail feathers known as sickles. They possess sharp beaks and strong legs equipped with spurs, which they use for defense and territorial displays. Roosters come in a variety of breeds, each with its own unique color patterns and physical traits, ranging from the majestic and imposing Brahma to the petite and feisty bantam breeds.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, roosters have held various cultural meanings and symbolism across different civilizations and societies. In many cultures, roosters are associated with vitality, courage, and vigilance. In ancient Greece, the rooster was a symbol of the sun god Apollo, representing the dawn and the triumph of light over darkness. Similarly, in Chinese culture, the rooster is one of the twelve animals of the Chinese zodiac, symbolizing honesty, punctuality, and fidelity.
    			<br>In Hindu mythology, the rooster is associated with the god of creation, Brahma, and is believed to herald the dawn and awaken humanity to the new day. In Celtic folklore, the rooster was revered as a guardian of the home, warding off evil spirits and bringing blessings to the household.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Roosters have a specialized vocal organ called a syrinx, which allows them to produce loud and distinctive crowing sounds, often used to establish territory and attract mates.</li>
    				<li>Roosters are highly territorial animals, defending their territory and harem of hens from rival males through displays of aggression and vocalizations.</li>
    				<li>The comb and wattles of a rooster serve as indicators of health and vitality, with larger and brighter combs often considered more attractive to potential mates.</li>
    				<li>Roosters have a remarkable ability to detect changes in the environment, including the approach of predators and changes in weather patterns, thanks to their acute senses of sight and hearing.</li>
    			</ul>
    			<p>In conclusion, roosters are not merely birds; they are symbols of dawn, vitality, and vigilance, embodying the spirit of new beginnings and the triumph of light over darkness. Their presence spans millennia, their crow inspires awe, and their symbolism resonates across cultures worldwide. As we unveil the vibrant world of roosters, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of courage, resilience, and the enduring beauty of the natural world.</p>";
				break;
			case 'Snake':
				$information = "<h4 class='title'>Delving into the Enigmatic World of Snakes: Symbols of Transformation and Rebirth</h4>
    			<p>Snakes, with their sinuous bodies and flickering tongues, have long fascinated and intrigued humans as symbols of both fear and reverence. These limbless reptiles, belonging to the suborder Serpentes, have a rich history steeped in mythology, cultural symbolism, and ecological importance. From their ancient origins to their enduring presence in folklore and religion, snakes continue to evoke a sense of mystery and awe in people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Snakes have slithered across the Earth for millions of years, evolving from ancestral reptiles during the Cretaceous period. Fossil records indicate that snakes once had legs and were more closely related to lizards, but over time they adapted to a limbless lifestyle, developing elongated bodies and flexible jaws capable of swallowing prey whole. Today, snakes are found in diverse habitats, ranging from tropical rainforests and deserts to grasslands and urban areas, showcasing their remarkable adaptability to different environments.</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Snakes are characterized by their elongated bodies, lack of limbs, and forked tongues, which they use to sense their surroundings and track prey. They possess highly specialized scales covering their bodies, providing protection and reducing friction as they move. Snakes come in a variety of sizes, colors, and patterns, ranging from the small and harmless garter snake to the large and deadly king cobra.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, snakes have held various cultural meanings and symbolism across different civilizations and societies. In many ancient cultures, snakes were revered as symbols of fertility, healing, and transformation. In Egyptian mythology, the serpent god Apep was believed to embody chaos and destruction, while the ouroboros, a symbol of a snake eating its own tail, represented eternal cycles of life, death, and rebirth.
    			<br>In Hinduism, the snake deity Shesha is depicted as a coiled serpent supporting the universe on its back, symbolizing protection and stability. Similarly, in Chinese culture, the snake is one of the twelve animals of the Chinese zodiac, representing wisdom, intuition, and transformation.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Snakes are ectothermic, meaning they rely on external sources of heat to regulate their body temperature. They bask in the sun to warm up and retreat to shade or burrows to cool down.</li>
    				<li>Some species of snakes, such as the black mamba and the king cobra, are among the deadliest animals on Earth, possessing potent venom capable of killing humans within minutes.</li>
    				<li>Snakes are skilled predators, using a combination of stealth, camouflage, and ambush tactics to capture prey such as rodents, birds, and amphibians.</li>
    				<li>Snakes are capable of swallowing prey much larger than their own heads, thanks to their flexible jaws and stretchy skin.</li>
    			</ul>
    			<p>In conclusion, snakes are not merely reptiles; they are symbols of transformation, rebirth, and eternal cycles of life. Their presence spans millions of years, their mystery inspires awe, and their symbolism resonates across cultures worldwide. As we delve into the enigmatic world of snakes, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as symbols of resilience, adaptation, and the enduring spirit of nature.</p>";
				break;
			case 'Tiger':
				$information = "<h4 class='title'>Exploring the Enigmatic World of Tigers: Guardians of the Jungle</h4>
    			<p>Tigers, with their striking stripes and powerful presence, have long been symbols of strength, courage, and wilderness. These magnificent creatures, belonging to the genus Panthera tigris, boast a rich history steeped in myth, cultural significance, and ecological importance. From their ancient origins to their enduring symbolism as the rulers of the jungle, tigers continue to captivate the imagination and admiration of people around the world.</p>
    			<h5 class='sub-title'>History in Existence:</h5>
    			<p>Tigers have prowled the forests and grasslands of Asia for millions of years, evolving from ancestral felids during the Pleistocene epoch. Fossil records suggest that tigers once had a much wider distribution, inhabiting regions as far-reaching as Europe and North America. However, due to habitat loss, human encroachment, and poaching, their range has significantly decreased, leading to their classification as an endangered species by the International Union for Conservation of Nature (IUCN).</p>
    			<h5 class='sub-title'>Description:</h5>
    			<p>Tigers are characterized by their distinctive orange coat with black stripes, which serve as camouflage in their natural habitat. They possess muscular bodies, powerful jaws, and sharp claws, making them formidable predators capable of hunting large prey such as deer, wild boar, and even young elephants. Tigers have keen senses, including excellent vision and hearing, which they rely on for hunting and navigating their territory.</p>
    			<h5 class='sub-title'>Cultural Meaning and Symbolism:</h5>
    			<p>Throughout history, tigers have held various cultural meanings and symbolism across different civilizations and societies. In many Asian cultures, tigers are revered as symbols of power, protection, and prosperity. In Chinese mythology, the tiger is one of the four celestial animals and represents strength and courage. Similarly, in Hindu mythology, the goddess Durga is often depicted riding a tiger, symbolizing her ferocity and ability to overcome obstacles.
    			<br>In Western cultures, tigers have been associated with bravery, fierceness, and untamed wilderness. They have been adopted as symbols of sports teams, military units, and corporate logos, representing qualities such as strength, agility, and resilience. In literature and popular culture, tigers have been portrayed as both fearsome predators and majestic creatures worthy of admiration and respect.
    			</p>
    			<h5 class='sub-title'>Fun Facts:</h5>
    			<ul>
    				<li>Tigers are the largest cats in the world, with some individuals weighing over 600 pounds (272 kilograms) and measuring up to 11 feet (3.3 meters) in length from nose to tail.</li>
    				<li>Unlike many other big cats, tigers are excellent swimmers and are known to hunt prey in the water, including fish and water buffalo.</li>
    				<li>Tigers have unique stripe patterns, much like human fingerprints, which can be used to identify individuals.</li>
    				<li>Tigers are primarily solitary animals, with males and females coming together only briefly for mating purposes.</li>
    			</ul>
    			<p>In conclusion, tigers are not merely animals; they are majestic rulers of the jungle, symbols of strength, courage, and wilderness. Their presence spans millennia, their roar echoes through the forests, and their symbolism resonates across cultures worldwide. As we explore the enigmatic world of tigers, we gain not only a deeper understanding of their ecological significance but also a profound appreciation for their role as guardians of the natural world and ambassadors of the wild.</p>";
				break;
    	}
    	return $information;
    }

    public function random_article($animal_name){
    	$category_name = $animal_name . " Symbolism";
        $posts = $this->pray_m->get_wp_posts_from_category($category_name);
        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }

	public function random_article_animals(){
        $posts = $this->pray_m->get_wp_posts_from_category("Animal and Insect Reading");
        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }   
}

