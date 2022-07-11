# Wordpress---Webshop
Wordpress - Webshop

## Gruppuppgift  
Slutprojektet går ut på att själv ta fram en e-handelsbutik baserad på WordPress  och WooCommerce. 
Ni skall hitta på ett företag som säljer någon typ av produkter på nätet. Ert  företag har också fysiska butiker.  

## Gruppmedlemmar: 
* Sanaz Shahed
* David Wong
* Angelica Moberg Skoglund

##


Påbörjad mockup innan alla fick tillgång till databasen: https://github.com/totaldekadens/wp_mockup_webshop

## Krav för G

1. Ni skall bygga ett tema med anpassad design som matchar ert företag och de  produkter ni säljer.  ✅ 

   - Temat skall vara helt egen-utvecklat.  

2. I e-handeln skall det finnas minst 3 produkt-kategorier.  ✅

3. I e-handeln skall det finnas minst 15 separata produkter. ✅ 
   - Minst 5 av produkterna skall vara variabla produkter.  
   - 1 produkt med 5 varianter räknas som 1 produkt 

4. Webbsidan skall visa dessa eller snarlika funktioner:  ✅ 
   - Ett bildspel som presenterar aktuella kampanjer.  ✅
            - En kampanj kan representeras av en kategori med produkter. Eller en rabattkod som ger rabatt. 
   - En listning av populära produkter  
     Populära produkter skall baseras på hur många som köpt dem.   
   - En listning av utvalda (”featured”) produkter  
   - En listning av produkter som för tillfället har reapris.  
   - De skall visas med reapris och ordinarie pris.  
   - En puff för det senaste inlägget från bloggen  

5. Det skall finnas en sida med villkor och regler.  ✅

6. Det skall finnas en blogg där det företaget publicerar inlägg om nya och  kommande produkter. ✅ 
   - Fyll på med 5 inlägg  
   - Inläggen skall ha länkar till relaterade produkter  

7. Det skall finnas en sida som listar företagets butiker.  ✅ 
   - Butikerna skall skapas med hjälp av en Custom Post Type  
   - I redigeringsläge ska det finnas ett fält för plats, och på sidan för butiken skall man  kunna se var butiken är på en karta.  

8. Det skall finnas en kontaktsida med följande funktioner  ✅ 
   - En karta som visar var företaget har sitt huvudkontor.  
   - Ett formulär med följande fält:  
         * Ärende
         * Möjligt att välja ”kontakt”, ” reklamation”, ”faktura”   
         * Namn  
         * Epost  
         * Meddelande 

HJ: Tillägg ok.

9. Ni skall ställa in så att e-handeln har moms enligt svenska regler. ✅ 

10. Kunden skall kunna registrera sig på webbplatsen och använda de mina sidor funktioner som följer med WooCommerce.  ✅ 
      - De skall kunna byta lösenord  
      - De skall kunna se sina tidigare order  
      - De skall kunna redigera sin faktura- och leveransadress 

11. För att visa att er e-handel fungerar skall ni lägga test order.   ✅ 
    - Genomför minst 5 test-köp 

12. En manual ✅ 
      - En handbok som presenterar er e-handelslösning samt förklarar handhavande för  webbredaktörer skall finnas med i inlämningen.  

13. Övriga punkter  
      - Webbplatsen som slutprojektet resulterar i skall ha en design som fungerar hela vägen  ifrån desktop till mobil, inklusive mellanlägen.  ✅ 
      - Webbplatsen skall utnyttja cache för att ladda sidor snabbt. ✅ 
      - Frontend för webbplatsen skall vara optimerad för att ladda snabbt. Planera in ett tillfälle  för att utföra tester och optimering. ✅ 
      - Bilder skall använda sig av tumnaglar i lagom storlek, så att inte onödigt tunga bilder  laddas in. ✅ 
  
  
## Krav för VG

14. Ni skall bygga ett eget plugin för leveransmetod  ✅ 

      Det leveransalternativet skall vara frakt med drönare.  
      Detta alternativ skall alltid kosta och det skall vara möjligt att ställa in pris i admin.  
      På er e-handel skall ni ha ställt in 3 olika fraktklasser.   
      Baserat på vilken fraktklass de produkter man har i varukorgen har så skall leveransen kosta olika mycket.
      Det skall gå att ställa in pris för varje fraktklass.  
      Vikten på produkterna i varukorgen avgör vilket pris leveransen får.   
      Avståndet ifrån lager till köpare påverkar priset på leverans.  

15. Ni skall bygga ett eget plugin för betalning  ✅ 
      - Betalningsmetoden skall vara betalning via faktura.  
      - För att få lov att betala via faktura måste användaren mata in sitt   personnummer.
      - Personnummer skall matas in i ett fält i kassan.
      - Om inget personnummer angivits skall ett felmeddelande presenteras när man försöker genomföra betalning.  
      - Personnumret skall valideras med hjälp av Luhn-algoritmen.   
      - Om personnumret inte stämmer kommer ett felmeddelande att presenteras  
      
      
      
## Sneak peak

### Desktop

#### Front page

![1  SA_frontpage_1_desktop](https://user-images.githubusercontent.com/90898648/178021575-dfe40ab7-f177-40f9-88f3-6f8a76256a36.JPG)

![2  SA_frontpage_1_esktop](https://user-images.githubusercontent.com/90898648/178021605-0811dc8b-ec33-45cd-9583-360b0407b52a.JPG)

![3  SA_frontpage_2_desktop](https://user-images.githubusercontent.com/90898648/178021620-ca4f2b05-1099-47d6-8e34-e7f7bc1638f8.JPG)

![4  SA_frontpage_3_desktop](https://user-images.githubusercontent.com/90898648/178021628-d3a252d8-02cf-401d-99f9-e69458412cde.JPG)

![5  SA_frontpage_4_desktop](https://user-images.githubusercontent.com/90898648/178021638-d8b0dfa9-499c-4948-99e2-1d111cefcf38.JPG)

![6  SA_frontpage_5_desktop](https://user-images.githubusercontent.com/90898648/178021647-774f01c9-bd23-47fc-b809-ba6bd76f7d14.JPG)

![7  SA_frontpage_6_desktop](https://user-images.githubusercontent.com/90898648/178021655-2e0957f3-d69f-4371-ba5c-5f32d4f6de44.JPG)

##

#### Collection page

![8  SA_collectionpage_1_desktop](https://user-images.githubusercontent.com/90898648/178021712-d27f0e69-1f47-4d68-b18a-d5448445eec3.JPG)

![9  SA_collectionpage_2_desktop](https://user-images.githubusercontent.com/90898648/178021725-84cdc3c2-08c2-4100-87cb-abf4eb3833f7.JPG)

##

#### Product page

![10  SA_productpage_1_desktop](https://user-images.githubusercontent.com/90898648/178021780-b8d4047e-18c8-40bd-8eaa-dc192fe220f6.JPG)

![11  SA_productpage_2_desktop](https://user-images.githubusercontent.com/90898648/178021788-55c701a3-db58-4070-8528-75e1f4da582a.JPG)

##

#### Cart / Checkout

![12  SA_cart_1_desktop](https://user-images.githubusercontent.com/90898648/178021855-b9fa75cf-0755-4e01-a2b2-7a82f276450e.JPG)

![13  SA_cart_2_desktop](https://user-images.githubusercontent.com/90898648/178021869-255b4fb5-7fc3-4d32-a179-e4c3d11dcaef.JPG)

![14  SA_cart_3_desktop](https://user-images.githubusercontent.com/90898648/178021875-f53f4a4a-a235-48b1-a1cb-9b3ca68972d9.JPG)

![15  SA_cart_4_desktop](https://user-images.githubusercontent.com/90898648/178021886-1bd76ad8-d32e-4b44-83b9-7805f5b0ca3f.JPG)

![16  SA_cart_5_desktop](https://user-images.githubusercontent.com/90898648/178021898-f00807c6-c2d1-46f5-a119-670cf71fe35f.JPG)

![17  SA_cart_6_desktop](https://user-images.githubusercontent.com/90898648/178021909-d65dadc5-8de9-4d8f-b877-65ba7a060921.JPG)

![18  SA_cart_7_desktop](https://user-images.githubusercontent.com/90898648/178021925-cb39c497-277a-435e-bbda-453153601bec.JPG)

![19  SA_cart_8_desktop](https://user-images.githubusercontent.com/90898648/178021947-3e69bd58-166e-4515-84be-ab8d489eefd6.JPG)

##

#### Magazine

![20  SA_magazine_1_desktop](https://user-images.githubusercontent.com/90898648/178022021-42f693cc-06d7-4415-a488-741c0434527a.JPG)

![21  SA_magazine_2_desktop](https://user-images.githubusercontent.com/90898648/178022041-516decff-71aa-49bc-8b66-37c6e047b933.JPG)

![22  SA_magazine_3_desktop](https://user-images.githubusercontent.com/90898648/178022054-03b50649-2e64-4045-acb4-c1b4fb8e88c5.JPG)

##

#### Post

![23  SA_post_1_desktop](https://user-images.githubusercontent.com/90898648/178022099-41959cbd-86f1-4ee2-b2e8-7e4a5583a22a.JPG)

![24  SA_post_2_desktop](https://user-images.githubusercontent.com/90898648/178022114-a83194ff-dac5-4589-a52c-5c7ff1bd6d82.JPG)

![25  SA_post_3_desktop](https://user-images.githubusercontent.com/90898648/178022133-7e010ec2-60a5-4d06-aca3-8acf2bccb627.JPG)

##

#### Contact

![26  SA_contact_desktop](https://user-images.githubusercontent.com/90898648/178022198-bcc81f31-8728-4a86-82d7-9600e32f1b38.JPG)

##

#### Store

![27  SA_store_desktop](https://user-images.githubusercontent.com/90898648/178022208-0019b599-4e28-4a89-874f-b32cf2493748.JPG)


### Mobile

#### Front page

![1  SA_frontpage_1_mobile](https://user-images.githubusercontent.com/90898648/178023242-dab5fe90-09e7-4e68-b1ed-7105beb07422.JPG)
![2  SA_frontpage_2_mobile](https://user-images.githubusercontent.com/90898648/178023257-58564149-7436-418b-8d46-6bd42bf9b559.JPG)
![3  SA_frontpage_3_mobile](https://user-images.githubusercontent.com/90898648/178023266-99636e2c-f810-46a5-bb5b-020d43f35f5e.JPG)
![4  SA_frontpage_4_mobile](https://user-images.githubusercontent.com/90898648/178023269-b115024b-f926-4798-a43c-1ab84d398466.JPG)


##

#### Collection page

![5  SA_collectionpage_1_mobile](https://user-images.githubusercontent.com/90898648/178023422-567a5552-133b-4cbe-ac66-932dba68b556.JPG)
![6  SA_collectionpage_2_mobile](https://user-images.githubusercontent.com/90898648/178023437-637032b2-fb93-4429-abb6-890bf3bee6b8.JPG)

##

#### Product page

![7  SA_productpage_1_mobile](https://user-images.githubusercontent.com/90898648/178023477-754003eb-bb29-4110-8369-de717a88e0f5.JPG)
![8  SA_productpage_2_mobile](https://user-images.githubusercontent.com/90898648/178023494-61a7240d-e296-4b86-acbe-95baae733df5.JPG)
![9  SA_productpage_3_mobile](https://user-images.githubusercontent.com/90898648/178023508-54bdf012-b2f0-49f0-9201-45fe3aa8be6b.JPG)
![10  SA_productpage_4_mobile](https://user-images.githubusercontent.com/90898648/178023534-137be4a1-4af2-4061-8dd1-0b16b21c2fa8.JPG)

##

#### Cart / Checkout

![11  SA_cart_1_mobile](https://user-images.githubusercontent.com/90898648/178023613-949d3c69-ff2e-48c2-99c0-f5e94c6c025e.JPG)
![12  SA_cart_2_mobile](https://user-images.githubusercontent.com/90898648/178023630-3e444897-fe73-4c8b-b723-9679433b759c.JPG)
![13  SA_cart_3_mobile](https://user-images.githubusercontent.com/90898648/178023638-1ca51d30-82eb-479b-bbb9-26582bcd8dfb.JPG)
![14  SA_cart_4_mobile](https://user-images.githubusercontent.com/90898648/178023697-690f834c-5fae-4395-9ac4-160265632260.JPG)
![15  SA_cart_5_mobile](https://user-images.githubusercontent.com/90898648/178023721-ea20c63d-5101-487f-86b8-e1e25685d589.JPG)
![16  SA_cart_6_mobile](https://user-images.githubusercontent.com/90898648/178023733-f0a3f3d4-704b-41df-b79e-5508ce5750f8.JPG)
![17  SA_cart_7_mobile](https://user-images.githubusercontent.com/90898648/178023743-fb74926a-6ee5-46c8-89bb-dbe07da38404.JPG)
![18  SA_cart_8_mobile](https://user-images.githubusercontent.com/90898648/178023759-24b5492d-2423-4551-88d3-1f56bf8f9731.JPG)
![19  SA_cart_9_mobile](https://user-images.githubusercontent.com/90898648/178023772-47297d7f-3852-448a-954d-f819758635fc.JPG)
![20  SA_cart_10_mobile](https://user-images.githubusercontent.com/90898648/178023801-3d2e091b-c9ce-4d84-b6e1-adb7ff9f1e5c.JPG)


##

#### Magazine

![21  SA_magazine_1_mobile](https://user-images.githubusercontent.com/90898648/178023865-153b1c79-d978-4236-9db0-738bd3840bda.JPG)
![22  SA_magazine_2_mobile](https://user-images.githubusercontent.com/90898648/178023887-957adb3d-866f-4944-8250-6b3769e3c6ae.JPG)

##

#### Post

![23  SA_post_1_mobile](https://user-images.githubusercontent.com/90898648/178023925-5719e412-377e-4e6f-94b2-f943b3c7123d.JPG)
![24  SA_post_2_mobile](https://user-images.githubusercontent.com/90898648/178023938-47c9cd74-0939-4227-9d97-d0ba8e2dd3fe.JPG)
![25  SA_post_3_mobile](https://user-images.githubusercontent.com/90898648/178023948-8f3af5a0-811b-43dc-9196-098c15e8fd8a.JPG)

##

#### Contact

![26  SA_contact_1_mobile](https://user-images.githubusercontent.com/90898648/178024045-1dfdf49b-54d1-4271-9d94-a4c832285fc2.JPG)
![27  SA_contact_2_mobile](https://user-images.githubusercontent.com/90898648/178024118-f90da17d-1812-44cc-a243-c65bd1d7113a.JPG)


##

#### Store

![28  SA_store_1_mobile](https://user-images.githubusercontent.com/90898648/178024137-ad313dfd-f47a-4b08-b300-042f5953b1c1.JPG)
![29  SA_store_2_mobile](https://user-images.githubusercontent.com/90898648/178024146-1f304962-770d-492c-ad14-73ffda2ecc8f.JPG)






