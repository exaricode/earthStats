class EarthInfo {
    constructor(name, stat) {
        this.name = name;
        this.stat = stat;
    }
}

const earthInformation = {
    measurements:[
        new EarthInfo('Radius', '6.371 km'),
        new EarthInfo('Surface', '510,000,000 km<sup>2</sup>'),
        new EarthInfo('Volume', '1,000,000,000,000 km<sup>3</sup>')
    ],
    rotation: [
        new EarthInfo('Earth spin', '1600 km/h'),
        new EarthInfo('Length of day', '23h 56min 4sec')
    ], 
    age: [
        new EarthInfo('Age', '&plusmn; 4.54 billion years old')
    ],   
    distance: [
        new EarthInfo('To the moon', '384.400 km'),
        new EarthInfo('To the sun', '149,600,000 km') 
    ],
    water: [
        new EarthInfo('Total', '70% of the surface'),
        new EarthInfo('Salt water', '97%'),
        new EarthInfo('Fresh water', '3%') 
    ],
    layers: [
        new EarthInfo('Crust', '0 - 35 km'),
        new EarthInfo('Mantle', '35 - 2,890 km'),
        new EarthInfo('Core', '2,890 - 6,360 km') 
    ],
    temperature: [
        new EarthInfo('Core temperature', '5,500 <sup>o</sup>C'),
        new EarthInfo('Surface', '-88 to 58 <sup>o</sup>C') 
    ],
    shape: [
        new EarthInfo('Shape', 'Oblate Spheroid'),
        new EarthInfo('Semi-major axis', '6,378,137.0 m'),
        new EarthInfo('Semi-minor axis', '6,356,752.3 m')
    ],
    speed: [
        new EarthInfo('Orbital speed', '29.78 km/s')
    ]
}

export default earthInformation;