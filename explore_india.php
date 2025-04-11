<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>explore_india</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />

    <!-- internal Stylesheets -->
    <style>
        body {
            padding-top: 60px;
            /* Push content down to prevent overlap */
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 images per row */
            gap: 15px;
            padding: 20px;
            max-width: 100%;
        }

        .gallery-item {
            text-align: center;
            /* Centers text below the image */
        }

        .gallery img {
            width: 100%;
            height: 300px;
            /* Uniform height */
            object-fit: cover;
            /* Ensures images don’t stretch */
            border-radius: 15px;
            /* Curved corners */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .gallery p {
            margin-top: 8px;
            font-size: 16px;
            color: #ffffff;
            font-weight: 500;
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(2, 1fr);
                /* 2 per row on tablets */
            }
        }

        @media (max-width: 480px) {
            .gallery {
                grid-template-columns: repeat(1, 1fr);
                /* 1 per row on small screens */
            }
        }
    </style>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>


<body>
    <!-- Navbar -->
    <nav class="navbar glass" style="height: 70px">
        <span><a href="index.html" style="display: flex; align-items: center"><img class="img2"
                    src="./img/Tour-india-logo.jpg" width="40" style="margin: -25px -10px -25px -20px" />
                <h1 class="logo">&nbsp;TOUR-INDIA</h1>
            </a></span>
        <ul class="nav-links">
            <li><a href="index.html" id="pri" class="active cir_border">Home</a></li>

        </ul>
        <img src="./img/menu-btn.png" alt="" class="menu-btn" />
    </nav>
    <!--navbar-->

    <!-- Main Content Wrapper -->

    <div class="gallery">
        <div class="gallery-item">
            <a href="#north-india"><img src="./img/north-india.webp" alt="North India"
                    style="border-radius: 10px;" /></a>
            <p style="background-color: #205255; border-radius: 30px;">North India</p>
        </div>
        <div class="gallery-item">
            <a href="#south-india"><img src="./img/south-india.webp" alt="South India"
                    style="border-radius: 10px;" /></a>
            <p style="background-color: #205255;  border-radius: 30px;">South India</p>
        </div>
        <div class="gallery-item">
            <a href="#east-india"><img src="./img/west-india.jpg" alt="East India" style="border-radius: 10px;" /></a>
            <p style="background-color: #205255;  border-radius: 30px;">East India</p>
        </div>
        <div class="gallery-item">
            <a href="#west-india"> <img src="./img/east-india.avif" alt="west india" style="border-radius: 10px;" /></a>
            <p style="background-color: #205255;  border-radius: 30px;">West Tndia</p>
        </div>
        <div class="gallery-item">
            <a href="#northeast-india"> <img src="./img/northeast-india.jpg" alt="North East INDIA"
                    style="border-radius: 10px;" /></a>
            <p style="background-color: #205255;  border-radius: 30px;">North East India</p>
        </div>
        <div class="gallery-item">
            <a href="#central-india"> <img src="./img/central-india.jpg" alt="Central India" style="border-radius: 10px;" /></a>
            <p style="background-color: #205255;  border-radius: 30px;">Central India</p>
        </div>
    </div>
    <div class="" id="north-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center; ">North India</h1>
        <div class="line"></div>
        <pre>
            North India boasts a rich tapestry of cultural heritage, natural beauty, and historical landmarks.
            Here's a curated list of notable destinations to consider for your vacation:

            1. Varanasi, Uttar Pradesh
            Description: One of the world's oldest continuously inhabited cities, Varanasi is a major spiritual hub
            for Hindus, renowned for its ghats along the Ganges River where daily rituals and the mesmerizing Ganga
            Aarti take place. 
            Highlights: Kashi Vishwanath Temple, boat rides at dawn, and exploring the vibrant local markets.

            2. Rishikesh, Uttarakhand
            Description: Nestled in the Himalayan foothills, Rishikesh is known as the "Yoga Capital of the World,"
            offering serene ashrams and adventure activities like white-water rafting.
            Highlights: Laxman Jhula suspension bridge, attending yoga sessions, and experiencing the evening Ganga
            Aarti.

            3. Jaipur, Rajasthan
            Description: The "Pink City" enchants visitors with its rose-hued architecture, bustling bazaars, and
            majestic forts, reflecting its royal heritage.
            Highlights: Amber Fort, Hawa Mahal, City Palace, and shopping for traditional handicrafts.

            4. Agra, Uttar Pradesh
            Description: Home to the iconic Taj Mahal, Agra showcases Mughal architecture's grandeur and rich
            history.
            Highlights: Taj Mahal, Agra Fort, and the tomb of Itimad-ud-Daulah.

            5. Shimla, Himachal Pradesh
            Description: Once the summer capital of British India, Shimla offers colonial charm amidst scenic hills
            and pleasant weather.
            Highlights: The Ridge, Mall Road, Jakhoo Temple, and the toy train ride from Kalka.

            6. Leh-Ladakh, Jammu & Kashmir
            Description: A high-altitude desert region, Ladakh is famed for its stark landscapes, Buddhist
            monasteries, and clear night skies.
            Highlights: Pangong Lake, Nubra Valley, Thiksey Monastery, and adventure activities like trekking and
            biking.

            7. Jaisalmer, Rajasthan
            Description: Known as the "Golden City," Jaisalmer captivates with its sandstone architecture and
            expansive Thar Desert landscapes.
            Highlights: Jaisalmer Fort, Patwon Ki Haveli, and camel safaris in the Sam Sand Dunes.

            8. Amritsar, Punjab
            Description: A spiritual and cultural center, Amritsar is home to the revered Golden Temple, a symbol of
            Sikhism's rich heritage.
            Highlights: Golden Temple, Jallianwala Bagh, and the Wagah Border ceremony.

            9. Dharamshala, Himachal Pradesh
            Description: Set against the Dhauladhar range, Dharamshala is the Tibetan government's seat in exile and
            offers a tranquil environment.
            Highlights: Namgyal Monastery, Tsuglagkhang Complex, and nearby trekking trails like Triund.

            10. Ranthambore National Park, Rajasthan
            Description: A premier wildlife reserve, Ranthambore is renowned for its tiger population and diverse
            flora and fauna.
            Highlights: Jeep safaris to spot tigers, Ranthambore Fort, and bird watching.
            
            Each of these destinations offers a unique experience, blending cultural insights, historical
            significance, and natural beauty. Depending on your interests—be it spirituality, adventure, history, or
            wildlife—you can choose the destinations that resonate most with your vacation aspirations.
        </pre>
    </div>
    <div class="" id="south-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center;   ">South India</h1>
        <div class="line"></div>
        <pre>
            South India is a treasure trove of diverse landscapes, rich cultural heritage, and architectural marvels.
            Here's a curated list of must-visit destinations to enhance your vacation experience:

            1. Mamallapuram (Mahabalipuram), Tamil Nadu
            Description: A historic town renowned for its 7th and 8th-century Hindu monuments, Mamallapuram is a UNESCO
            World Heritage Site. Notable landmarks include the Shore Temple, Pancha Rathas (Five Chariots), and Arjuna's
            Penance, one of the largest open-air rock reliefs in the world.

            2. Meenakshi Amman Temple, Madurai, Tamil Nadu
            Description: An architectural marvel, this historic temple is dedicated to Goddess Meenakshi and Lord
            Sundareswarar. It's renowned for its intricate carvings, towering gopurams (gateway towers), and vibrant
            sculptures, showcasing Dravidian architecture.

            3. Hampi, Karnataka
            Description: Once the capital of the Vijayanagara Empire, Hampi is now a UNESCO World Heritage Site. The
            site boasts a vast collection of ancient temples, royal complexes, and stone-carved monuments set amidst a
            surreal boulder-strewn landscape.

            4. Kerala Backwaters
            Description: A network of serene lagoons, lakes, and canals parallel to the Arabian Sea coast, the Kerala
            Backwaters offer a tranquil experience. Houseboat cruises provide insights into local life, lush landscapes,
            and unique ecosystems.

            5. Mysore Palace, Karnataka
            Description: A stunning example of Indo-Saracenic architecture, Mysore Palace is the former residence of the
            Wadiyar dynasty. The palace is renowned for its grandeur, intricate interiors, and the annual Dasara
            festival celebrations.

            6. Periyar Wildlife Sanctuary, Kerala
            Description: Located in Thekkady, this sanctuary is a haven for wildlife enthusiasts. Home to elephants,
            tigers, and diverse bird species, visitors can enjoy boat rides on Periyar Lake and guided jungle treks.

            7. Pondicherry (Puducherry)
            Description: A former French colony, Pondicherry is known for its colonial architecture, serene beaches, and
            the spiritual community of Auroville. The French Quarter's charming streets and cafes offer a unique blend
            of cultures.

            8. Coorg (Kodagu), Karnataka
            Description: Dubbed the "Scotland of India," Coorg is famed for its lush coffee plantations, rolling hills,
            and pleasant climate. Attractions include Abbey Falls, Talacauvery (the source of the River Cauvery), and
            Dubare Elephant Camp.

            9. Varkala, Kerala
            Description: Varkala is a coastal town known for its unique cliffs adjacent to the Arabian Sea. Papanasam
            Beach, believed to have holy waters, and the ancient Janardanaswamy Temple are major attractions.

            10. Chikmagalur, Karnataka
            Description: A serene hill station, Chikmagalur is renowned for its coffee estates, verdant hills, and
            trekking trails. Notable spots include Mullayanagiri Peak, the highest in Karnataka, and the historic Baba
            Budangiri hills.

            Each of these destinations offers a unique glimpse into South India's rich tapestry of history, culture, and
            natural beauty, ensuring a memorable vacation experience.
        </pre>
    </div>
    <div class="" id="east-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center;   ">East India</h1>
        <div class="line"></div>
        <pre>
            East India offers a rich tapestry of cultural heritage, natural beauty, and historical significance. Here
            are some notable destinations to consider for your vacation:

            1. Konark Sun Temple, Odisha
            Description: A UNESCO World Heritage Site, the 13th-century Konark Sun Temple is an architectural marvel
            dedicated to the Sun God. Designed as a colossal chariot with intricately carved stone wheels, pillars, and
            walls, it showcases the zenith of Kalinga architecture.

            2. Chilika Lake, Odisha
            Description: Asia's largest brackish water lagoon, Chilika Lake is a haven for birdwatchers, especially
            during the migratory season when it hosts a plethora of avian species. The lake's serene waters and
            picturesque islands make it a tranquil retreat.

            3. Santiniketan, West Bengal
            Description: Founded by Nobel laureate Rabindranath Tagore, Santiniketan is a cultural hub that emphasizes
            traditional Indian art, culture, and education. The Visva-Bharati University here attracts scholars and
            artists from around the globe.

            4. Nalanda, Bihar
            Description: Home to the ancient Nalanda University, one of the world's first residential universities, this
            UNESCO World Heritage Site offers insights into early Buddhist education and monastic life. The
            archaeological remains reflect a rich academic legacy.

            5. Mahabodhi Temple, Bodh Gaya, Bihar
            Description: A significant pilgrimage site for Buddhists, the Mahabodhi Temple complex marks the location
            where Siddhartha Gautama attained enlightenment under the Bodhi tree. The temple's serene ambiance and
            historical importance make it a must-visit.

            6. Kongthong Village, Meghalaya
            Description: Also known as the 'Singing Village,' Kongthong is renowned for its unique tradition where
            villagers communicate using musical tunes instead of names. Nestled amidst lush hills, it offers a glimpse
            into indigenous Khasi culture.

            Each of these destinations provides a unique experience, reflecting the diverse cultural and natural
            landscapes of East India.
        </pre>
    </div>
    <div class="" id="west-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center;   ">West India</h1>
        <div class="line"></div>
        <pre>
            West India is a region rich in cultural heritage, historical landmarks, and natural beauty. Here are some
            notable destinations to consider for your vacation:

            1. Rajasthan
            Jaipur (Pink City): The capital city, renowned for its vibrant culture and historic architecture, including
            the Hawa Mahal and Amer Fort.

            Udaipur (City of Lakes): Known for its intricate palaces and serene lakes, offering a romantic ambiance.

            Jaisalmer (Golden City): Famous for its golden sandstone architecture and the expansive Thar Desert.

            Jodhpur (Blue City): Recognized for its blue-painted houses and the majestic Mehrangarh Fort.

            Mount Abu: The state's only hill station, offering a cool retreat with attractions like the Dilwara Temples.

            2. Maharashtra
            Mumbai: India's financial hub, known for landmarks like the Gateway of India and the historic Taj Mahal
            Palace Hotel.

            Ajanta and Ellora Caves: UNESCO World Heritage Sites featuring intricate rock-cut caves and ancient temples.

            Pune: A city that blends modernity with tradition, offering historical sites and a burgeoning culinary
            scene.

            Shirdi: A significant pilgrimage site dedicated to Sai Baba, attracting devotees worldwide.

            Lonavala and Khandala: Popular hill stations known for their scenic beauty and pleasant climate.

            3. Gujarat
            Statue of Unity: The world's tallest statue, honoring Sardar Vallabhbhai Patel, offering panoramic views and
            educational exhibits.

            Rann of Kutch: A vast salt marsh hosting the annual Rann Utsav, showcasing local culture and crafts.

            Gir National Park: The only natural habitat of the Asiatic lion, providing unique wildlife experiences.

            Somnath Temple: An ancient temple with significant historical and religious importance, located along the
            Arabian Sea.

            Ahmedabad: A city rich in history, featuring sites like the Sabarmati Ashram and the intricately carved
            Adalaj Stepwell.

            Each of these destinations offers a unique glimpse into the diverse cultural and natural landscapes of West
            India, ensuring a memorable vacation experience.
        </pre>
    </div>
    <div class="" id="northeast-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center;   ">NorthEast India</h1>
        <div class="line"></div>
        <pre>
            Northeast India, comprising eight states, offers a rich tapestry of cultures, landscapes, and experiences.
            Here are some notable destinations to consider for your vacation:

            1. Kaziranga National Park, Assam
            Description: A UNESCO World Heritage Site, Kaziranga is renowned for hosting two-thirds of the world's great
            one-horned rhinoceroses. The park also boasts the highest density of tigers among protected areas globally
            and is home to elephants, wild water buffalo, and various bird species.
            
            2. Manas National Park, Assam
            Description: Another UNESCO World Heritage Site, Manas is a biosphere reserve and a Project Tiger reserve.
            It offers a unique combination of scenic landscapes and rich biodiversity, including rare species like the
            Assam roofed turtle and the pygmy hog.
           
            3. Tawang, Arunachal Pradesh
            Description: Nestled at an elevation of approximately 3,048 meters, Tawang is known for its 17th-century
            Tawang Monastery, the largest in India. The town offers breathtaking views of the Eastern Himalayas and is a
            significant center for Mahayana Buddhism.

            4. Shillong, Meghalaya
            Description: Often referred to as the "Scotland of the East," Shillong is known for its rolling hills,
            pleasant climate, and vibrant culture. Key attractions include Umiam Lake, Elephant Falls, and the lively
            markets of Police Bazaar.

            5. Cherrapunji, Meghalaya
            Description: Famous for its living root bridges and heavy rainfall, Cherrapunji offers lush landscapes,
            numerous waterfalls, and unique bioengineering marvels created by the Khasi tribes.

            6. Loktak Lake, Manipur
            Description: The largest freshwater lake in Northeast India, Loktak is renowned for its phumdis (floating
            islands). The Keibul Lamjao National Park, located on these phumdis, is the world's only floating national
            park and the natural habitat of the endangered Sangai deer.
           
            7. Mawlynnong, Meghalaya
            Description: Dubbed the "Cleanest Village in Asia," Mawlynnong showcases sustainable living practices and
            offers picturesque views of the surrounding landscapes.

            8. Ziro Valley, Arunachal Pradesh
            Description: Home to the Apatani tribe, Ziro Valley is known for its pine-clad hills, rice fields, and the
            annual Ziro Music Festival, which attracts artists and enthusiasts from across the country.

            9. Gangtok, Sikkim
            Description: The capital city of Sikkim, Gangtok offers stunning views of Mount Kanchenjunga, the
            third-highest peak in the world. The city serves as a base for exploring Buddhist monasteries, such as
            Rumtek and Enchey, and offers opportunities for trekking and river rafting.

            10. Darjeeling, West Bengal
            Description: Famous for its tea plantations and panoramic views of the Himalayas, Darjeeling is also home to
            the Darjeeling Himalayan Railway, a UNESCO World Heritage Site. The "Toy Train" journey offers a unique
            experience, winding through forests and hills.
            
            Each of these destinations provides a unique glimpse into the diverse cultural and natural landscapes of
            Northeast India, ensuring a memorable vacation experience.
        </pre>
    </div>
    <div class="" id="central-india"
        style="align-self:center; font-size: 15px; line-height: 1.5; color: #ffffff; font-family: 'Courier New', Courier, monospace;">
        <h1 class="font-color" style="text-align: center;   ">Central India</h1>
        <div class="line"></div>
        <pre>
            Central India, encompassing the states of Madhya Pradesh and Chhattisgarh, is rich in cultural heritage,
            natural beauty, and historical significance. Here are some notable destinations to consider for your
            vacation:

            1. Khajuraho Group of Monuments, Madhya Pradesh
            Description: A UNESCO World Heritage Site, Khajuraho is renowned for its intricately carved temples that
            date back to the 9th and 10th centuries. These temples are celebrated for their nagara-style architectural
            symbolism and erotic sculptures, reflecting the rich cultural heritage of India.

            2. Kanha National Park, Madhya Pradesh
            Description: One of India's largest tiger reserves, Kanha National Park inspired Rudyard Kipling's "The
            Jungle Book." The park boasts a significant population of Royal Bengal tigers, leopards, sloth bears, and
            Indian wild dogs, making it a haven for wildlife enthusiasts.

            3. Bandhavgarh National Park, Madhya Pradesh
            Description: Known for having one of the highest densities of Bengal tigers in the world, Bandhavgarh
            National Park offers visitors a high chance of tiger sightings. The park also features a historic fort and
            ancient caves with inscriptions, adding to its allure.

            4. Sanchi Stupa, Madhya Pradesh
            Description: Another UNESCO World Heritage Site, the Sanchi Stupa is one of the oldest stone structures in
            India, commissioned by Emperor Ashoka in the 3rd century BCE. The site is a significant Buddhist pilgrimage
            destination, showcasing ancient art and architecture.

            5. Bhedaghat, Madhya Pradesh
            Description: Famous for the Marble Rocks, Bhedaghat offers a unique experience where the Narmada River flows
            through a gorge of towering marble cliffs. The Dhuandhar Falls, where the river plunges dramatically, is a
            major attraction.

            6. Pachmarhi, Madhya Pradesh
            Description: Known as the "Queen of Satpura," Pachmarhi is the only hill station in Madhya Pradesh. It
            offers lush greenery, waterfalls, caves, and colonial-era architecture, making it a serene retreat for
            nature lovers.

            7. Gwalior Fort, Madhya Pradesh
            Description: Often referred to as the "Gibraltar of India," Gwalior Fort is a historic fortification that
            has stood the test of time. The fort complex includes palaces, temples, and water tanks, reflecting a blend
            of architectural styles from different eras.

            8. Chitrakote Falls, Chhattisgarh
            Description: Dubbed the "Niagara of India," Chitrakote Falls is the widest waterfall in India, cascading
            from a height of about 29 meters. The falls are particularly mesmerizing during the monsoon season when the
            Indravati River is in full spate.

            9. Kanger Valley National Park, Chhattisgarh
            Description: This national park is known for its biodiversity, limestone caves, waterfalls, and rich flora
            and fauna. The Kutumsar and Kailash caves, with their stunning stalactite and stalagmite formations, are
            major attractions.

            10. Rajgir Hills, Bihar
            Description: The Rajgir Hills, also known as "Rajgriha" hills, are near the city of Rajgir in Bihar.
            Surrounded by five hills—Ratnagiri, Vipulachal, Vaibharagiri, Songiri, and Udaygiri—the area is an important
            Buddhist, Hindu, and Jain pilgrimage site. Visitors can explore historical sites dating back to the
            Mahabharata period, as well as Buddhist shrines like the Peace Pagoda.

            Each of these destinations offers a unique glimpse into the diverse cultural and natural landscapes of
            Central India, ensuring a memorable vacation experience.
        </pre>
    </div>
    <!-- End of Main Content -->
    <!-- Footer Section -->
    <section class="footer" style="margin-bottom: 0% ;">
        <span>Created By Pratham Bhatt | © 2025</span>
        <div class="social">
            <ul>
                <li><a href="https://x.com/Pratham000987" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/pratham__987" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                <li><a href="https://www.linkedin.com/in/pratham-bhatt-211a8822a" target="_blank"><i
                            class="fa fa-linkedin"></i></a></li>
                <li><a href="https://github.com/Bhatt135" target="_blank"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </section>
    <!--footer-->
    <!-- chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/03/04/09/20250304095305-F4CIKGZ8.js"></script>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const menuBtn = document.querySelector(".menu-btn");
        const navLinks = document.querySelector(".nav-links");

        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("mobile-menu");
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>

</body>

</html>