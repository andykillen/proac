let output = {
    title : "hello I am a title",
    subtitle : "I am the description",
    content : "<p>After a year in research and development the D48 is now ready for production.</p><p>Areas of improvement have been mid-range detail and a cleaner, faster and more extended bass response.  A new studio monitor quality bass driver was designed for the D48.  It features a special impregnated cone and mid frequencies are tuned by a cap of greater size than standard.  This gives the new unit greater mid-range detail along with excellent bass control giving a tighter and more extended response.  The two new bass drivers are each loaded through our special floor loading with side vents, this makes the loudspeaker easier to sight and reacts less to surroundings.  The two bass units are then seamlessly mated to our ribbon or dome  tweeter depending on your preference.  With such a large slim floor standing design the sound stage is superb being very large and with pinpoint imagery.  Another achievement for the D48 is its ability to create large orchestral works as well as heavy rock music.</p><p>The D48 has a high quality filter network designed by Stewart Tyler comprising of the finest components, ProAc cable on a special board.  The filter is also split for bi-amping and bi-wiring.   This is one of the best designs from ProAc and should please all audio files regardless of their taste in music.</p>",
    specification :[
        {title: "Nominal Impedance",
        value: ["4 ohms"]
        },
        {title: "finishes",
        value: ["Black Ash", "Mahogany", "Cherry", "Maple"]
        },
    ]
    ,
    gallery:["http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D489.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D483.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4817.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4811.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4814.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4816.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D488.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4810.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D481.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D484.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D486.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D485.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D482.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4812.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4815.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D4813.jpg","http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/PictureSelector/D487.jpg"],
    featured: "http://www.proac-loudspeakers.com/Speakers/Response/ResponseD48/RightNew.png" ,
    range : "Response"
};

console.log(output);


fetch('http://admin.ecom.com/wp-json/proac/v1/import', {
headers: { "Content-Type": "application/json; charset=utf-8" },
method: 'POST',
body: JSON.stringify(output)
});