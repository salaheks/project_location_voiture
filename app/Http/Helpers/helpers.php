<?php

use Carbon\Carbon;

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('profile.image', $size);
    }
    return asset('assets/images/default.png');
}

function imagePath()
{
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'deposit' => [
            'path' => 'assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['ticket'] = [
        'path' => 'assets/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
        'size' => '36x36',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user' => [
            'path' => 'assets/images/user/profile',
            'size' => '350x350'
        ],
        'admin' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400'
        ]
    ];
    $data['vehicles'] = [
        'path' => 'assets/images/vehicles',
        'size' => '770x480'
    ];
    return $data;
}

function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function sidebarVariation()
{

    /// for sidebar
    $variation['sidebar'] = 'bg_img';

    //for selector
    $variation['selector'] = 'capsule--rounded';

    //for overlay
    $variation['overlay'] = 'overlay--indigo';

    //Opacity
    $variation['opacity'] = 'overlay--opacity-8'; // 1-10

    return $variation;
}

function marques()
{
    return array('Citroen' => 'Citroen', 'Dacia' => 'Dacia', 'Fiat' => 'Fiat', 'Hyundai' => 'Hyundai', 'Peugeot' => 'Peugeot', 'Renault' => 'Renault', 'Abarth' => 'Abarth', 'Alfa Romeo' => 'Alfa Romeo', 'Alpine' => 'Alpine', 'Artega' => 'Artega', 'Aston Martin' => 'Aston Martin', 'Audi' => 'Audi', 'Bentley' => 'Bentley', 'BMW' => 'BMW', 'Cadillac' => 'Cadillac', 'Chevrolet' => 'Chevrolet', 'Chrysler' => 'Chrysler', 'Cupra' => 'Cupra', 'Daihatsu' => 'Daihatsu', 'Dodge' => 'Dodge', 'Donkervoort' => 'Donkervoort', 'DS' => 'DS', 'Ferrari' => 'Ferrari', 'Ford' => 'Ford', 'Honda' => 'Honda', 'Hummer' => 'Hummer', 'Infiniti' => 'Infiniti', 'Isuzu' => 'Isuzu', 'Jaguar' => 'Jaguar', 'Jeep' => 'Jeep', 'KIA' => 'KIA', 'KTM' => 'KTM', 'Lada' => 'Lada', 'Lamborghini' => 'Lamborghini', 'Lancia' => 'Lancia', 'Land Rover' => 'Land Rover', 'Lexus' => 'Lexus', 'Lotus' => 'Lotus', 'Maserati' => 'Maserati', 'Mazda' => 'Mazda', 'McLaren' => 'McLaren', 'Mercedes-Benz' => 'Mercedes-Benz', 'MG' => 'MG', 'Mia Electric' => 'Mia Electric', 'MINI' => 'MINI', 'Mitsubishi' => 'Mitsubishi', 'Nissan' => 'Nissan', 'Opel' => 'Opel', 'Porsche' => 'Porsche', 'Rolls-Royce' => 'Rolls-Royce', 'Saab' => 'Saab', 'Seat' => 'Seat', 'Skoda' => 'Skoda', 'Smart' => 'Smart', 'Ssangyong' => 'Ssangyong', 'Subaru' => 'Subaru', 'Suzuki' => 'Suzuki', 'Tesla' => 'Tesla', 'Toyota' => 'Toyota', 'Volkswagen' => 'Volkswagen', 'Volvo' => 'Volvo');
}

function models($model)
{

    $models = [];
    $models['Abarth'] = ['500', '500 C', '595'];
    $models['Alfa Romeo'] = ['Giulia', 'Giulietta', 'Stelvio', 'Mito', 'Gtv'];
    $models['Alpine'] = ['A110'];
    $models['Artega'] = ['GT'];
    $models['Aston Martin'] = ['DB11', 'DBS Superleggera', 'Dbx', 'Vantage'];
    $models['Audi'] = ['A1', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'E-tron', 'Q2', 'Q3', 'Q5', 'Q7', 'Q8', 'R8', 'TT'];
    $models['Bentley'] = ['Bentayga', 'Continental GT', 'Flying Spur', 'Mulsanne'];
    $models['BMW'] = ['i3', 'i8', 'Série 1', 'Série 2', 'Série 3', 'Série 4', 'Série 5', 'Série 6', 'Série 7', 'Série 8', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'Z4', 'Z3', 'Z8'];
    $models['Cadillac'] = ['ATS', 'BLS', 'CTS', 'Eldorado', 'Escalade', 'Seville', 'SRX', 'STS', 'XLR'];
    $models['Chevrolet'] = ['Alero', 'Astro', 'Aveo', 'Beretta', 'Blazer', 'Camaro', 'Captiva', 'Corsica', 'Corvette', 'Corvette C6', 'Cruze', 'Epica', 'Evanda', 'HHR', 'Kalos', 'Lacetti', 'Lumina', 'Malibu', 'Matiz', 'Nubira', 'Orlando', 'Spark', 'Tacuma', 'Tahoe', 'TrailBlazer', 'Trans Sport', 'Trax', 'Volt'];
    $models['Chrysler'] = ['300C', '300M', 'Crossfire', 'Grand', 'Grand Voyager', 'Le Baron', 'Neon', 'New Yorker', 'PT Cruiser', 'Sebring', 'Sebring Convertible', 'Stratus', 'Viper', 'Vision', 'Voyager'];
    $models['Citroen'] = ['Berlingo', 'C1', 'C3', 'C3 aircross', 'C4 Cactus', 'C4 spacetourer', 'C5 aircross', 'Grand C4 spacetourer', 'Jumpy', 'Spacetourer', 'AX', 'C-Elysée', 'C-Zero', 'C.Crosser', 'C15', 'C2', 'C3 Picasso', 'C3 Pluriel', 'C4', 'C4 Aircross', 'C4 Picasso', 'C5', 'C6', 'C8', 'DS 3', 'DS 4', 'DS 5', 'E-mehari', 'Evasion', 'Grand C4 Picasso', 'Nemo', 'Saxo', 'Xantia', 'XM', 'Xsara', 'Xsara Picasso', 'ZX'];
    $models['Cupra'] = ['Ateca', 'Leon CUPRA', 'Leon CUPRA Sportstourer', 'Leon CUPRA R Sportstourer'];
    $models['Dacia'] = ['Dokker', 'Duster', 'Lodgy', 'Logan', 'Sandero', 'Logan MCV', 'Sandero Stepway'];
    $models['Daihatsu'] = ['Applause', 'Charade', 'Copen', 'Cuore', 'Domino', 'Feroza', 'Gran Move', 'Materia', 'Move', 'Rocky', 'Sirion', 'Terios', 'Trevis', 'YRV'];
    $models['Dodge'] = ['Avenger', 'Caliber', 'Journey', 'Nitro', 'Viper'];
    $models['Donkervoort'] = ['D8', 'Donkervoort'];
    $models['DS'] = ['DS 3', 'DS 7', 'DS 4', 'DS 5'];
    $models['Ferrari'] = ['812', 'F 488', 'F8', 'GTC4', 'Monza', 'Portofino', 'Roma', 'Sf90', 'California', 'F 12', 'F 355', 'F 360', 'F 430', 'F 456', 'F 458', 'F 50', 'F 512', 'F 575', 'F 599', 'F 612', 'FF', 'Superamerica'];
    $models['Fiat'] = ['500', '500L', '500X', 'Panda', 'Qubo', 'Tipo', '124 spider', '126', 'Barchetta', 'Brava', 'Bravo', 'Cinquecento', 'Coupé', 'Croma', 'Doblo', 'Fiorino', 'Freemont', 'Idea', 'Marea', 'Multipla', 'Palio', 'Punto', 'Scudo', 'Sedici', 'Seicento', 'Stilo', 'Tempra', 'Ulysse', 'Uno'];
    $models['Ford'] = ['Ecosport', 'Edge', 'Explorer', 'Fiesta', 'Focus', 'Galaxy', 'Kuga', 'Mondeo', 'Mustang', 'Mustang mach-e', 'Puma', 'S-Max', 'Tourneo', 'Tourneo custom', 'B-Max', 'C-Max', 'Cougar', 'Courier', 'Escort', 'Focus C-Max', 'Focus Coupé Cabriolet', 'Fusion', 'Grand C-Max', 'GT', 'Ka', 'Ka+', 'Maverick', 'Orion', 'Probe', 'Ranger', 'Scorpio', 'Sierra'];
    $models['Honda'] = ['Civic', 'CR-V', 'Honda e', 'HR-V', 'Jazz', 'Accord', 'Concerto', 'CR-Z', 'CRX', 'FR-V', 'Insight', 'Integra', 'Legend', 'Logo', 'New', 'NSX', 'Prelude', 'S 2000', 'Shuttle', 'Stream'];
    $models['Hummer'] = ['H2', 'H3'];
    $models['Hyundai'] = ['i10', 'i20', 'i30', 'Ioniq', 'ix20', 'Kona', 'Nexo', 'Santa Fe', 'Tucson', 'Accent', 'Atos', 'Atos Prime', 'Azera', 'Coupé', 'Elantra', 'Excel', 'Galloper', 'Genesis', 'Genesis Coupé', 'Getz', 'Grand Santa Fe', 'Grandeur', 'H-1 People', 'i40', 'ix35', 'ix55', 'Lantra', 'Matrix', 'Pony', 'Satellite', 'Scoupé', 'Sonata', 'Terracan', 'Trajet', 'Veloster', 'XG'];
    $models['Infiniti'] = ['Q30', 'Q50', 'QX30', 'EX37', 'FX', 'G37', 'M', 'Q60 Coupé', 'Q70', 'QX50', 'QX70'];
    $models['Isuzu'] = ['D-Max'];
    $models['Jaguar'] = ['E-pace', 'F-pace', 'F-Type', 'I-pace', 'XE', 'XF', 'XJ', 'Oldtimer', 'S-Type', 'X-Type', 'XJ-S', 'XK'];
    $models['Jeep'] = ['Cherokee', 'Compass', 'Grand Cherokee', 'Renegade', 'Wrangler', 'Commander', 'Grand', 'Patriot'];
    $models['KIA'] = ['Ceed', 'Niro', 'Optima', 'Picanto', 'Proceed', 'Rio', 'Sorento', 'Soul', 'Sportage', 'Stinger', 'Stonic', 'Venga', 'Xceed', 'Carens', 'Carnival', 'Cerato', 'Clarus', 'Magentis', 'Opirus', 'Pride', 'Retona', 'Sephia', 'Shuma'];
    $models['KTM'] = ['X-Bow'];
    $models['Lada'] = ['110', '111', '112', '4x4', 'Classica', 'Diva', 'Granta', 'Kalina', 'Niva', 'Priora', 'Samara'];
    $models['Lamborghini'] = ['Aventador', 'Huracán', 'Urus', 'Diablo', 'Gallardo', 'Murciélago'];
    $models['Lancia'] = ['Dedra', 'Delta', 'Flavia', 'Kappa', 'Lybra', 'Musa', 'Phedra', 'Thema', 'Thesis', 'Voyager', 'Y', 'Y 10', 'Ypsilon', 'Zeta'];
    $models['Land Rover'] = ['Defender', 'Discovery', 'Discovery sport', 'Range Rover', 'Range Rover Evoque', 'Range Rover Sport', 'Range rover velar', 'Defender Pick-Up', 'Freelander', 'Range'];
    $models['Lexus'] = ['CT', 'ES', 'IS', 'LC', 'LS', 'NX', 'RC', 'RX', 'UX', 'GS', 'SC'];
    $models['Lotus'] = ['Elise', 'Evora', 'Exige', '2-Eleven', 'Elan', 'Esprit', 'Europa'];
    $models['Maserati'] = ['Ghibli', 'Levante', 'Quattroporte', 'Cabriolet', 'Coupé', 'GranCabrio', 'GranTurismo', 'Spyder'];
    $models['Mazda'] = ['CX-3', 'CX-30', 'CX-5', 'Mazda2', 'Mazda3', 'Mazda6', 'MX-30', 'MX-5', '121', '323', '626', 'CX-7', 'Demio', 'Mazda5', 'MPV', 'MX-3', 'MX-6', 'Premacy', 'RX-7', 'RX-8', 'Tribute', 'Xedos 6', 'Xedos 9'];
    $models['McLaren'] = ['540C', '570GT', '570S', '600LT', '720S', '650S', 'MP4-12C'];
    $models['Mercedes-Benz'] = ['Classe A', 'Classe B', 'Classe C', 'Classe CLA', 'Classe CLS', 'Classe E', 'Classe G', 'Classe GLA', 'Classe GLC', 'Classe GLE', 'Classe GLS', 'Classe S', 'Classe SLC', 'Classe V', 'EQC', 'GLB', 'GT AMG', '190', 'Citan', 'Classe CL', 'Classe CLC', 'Classe CLK', 'Classe GL', 'Classe GLK', 'Classe M', 'Classe R', 'Classe SL', 'Classe SLK', 'SLR-McLaren', 'SLS AMG', 'Vaneo', 'Viano'];
    $models['MG'] = ['ZS', 'MG-TF', 'MGF', 'ZR', 'ZT'];
    $models['Mia Electric'] = ['Mia C', 'Mia L', 'Mia 2012'];
    $models['MINI'] = ['Countryman', 'Mini 3p', 'Mini 5p', 'Cabrio', 'Clubman', 'Paceman'];
    $models['Mitsubishi'] = ['ASX', 'Eclipse cross', 'Outlander', 'Space Star', '3000 GT', 'Attrage', 'Carisma', 'Colt', 'Eclipse', 'Galant', 'Grandis', 'i-MiEV', 'L200', 'Lancer', 'Lancer EVO', 'Lancer Evolution', 'Pajero', 'Pajero Pinin', 'Pajero Sport', 'Sigma', 'Space Gear', 'Space Runner', 'Space Wagon', 'Valley'];
    $models['Nissan'] = ['370Z', 'Evalia', 'GT-R', 'Juke', 'Leaf', 'Micra', 'NV200', 'Qashqai', 'X-TRAIL', '100', '100 NX', '200', '200 SX', '300 ZX', '350Z', 'Almera', 'Almera Tino', 'Combi-8', 'Cube', 'Maxima', 'Maxima QX', 'Murano', 'Navara', 'Note', 'Pathfinder', 'Patrol', 'Patrol GR', 'Pick-Up', 'Pixo', 'Prairie', 'Primastar', 'Primera', 'Pulsar', 'Qashqai+2', 'Serena', 'Sunny', 'Terrano', 'Terrano II', 'Vanette'];
    $models['Opel'] = ['Ampera-e', 'Astra', 'Combo', 'Corsa', 'Crossland x', 'Grandland X', 'Insignia', 'Zafira', 'Zafira Tourer', 'Adam', 'Agila', 'Ampera', 'Antara', 'Calibra', 'Campo', 'Cascada', 'Frontera', 'GT', 'Kadett', 'Karl', 'Meriva', 'Mokka', 'Mokka x', 'Monterey', 'Omega', 'Senator', 'Signum', 'Sintra', 'Speedster', 'Tigra', 'Tigra TwinTop', 'Vectra', 'Vivaro'];
    $models['Peugeot'] = ['108', '2008', '208', '3008', '308', '5008', '508', 'Partner', 'Rifter', '1007', '106', '107', '205', '206', '206 CC', '206+', '207', '306', '307', '307 CC', '307 SW', '309', '4007', '4008', '405', '406', '407', '407 Coupé', '508 RXH', '605', '607', '806', '807', 'Bipper', 'Expert', 'iOn', 'RCZ', 'Traveller'];
    $models['Porsche'] = ['718', '911', 'Cayenne', 'Macan', 'Panamera', 'Taycan', '918', '928', '944', '968', 'Boxster', 'Carrera', 'Carrera GT', 'Cayman'];
    $models['Renault'] = ['Captur', 'Clio', 'Espace', 'Grand Scénic', 'Kadjar', 'Kangoo', 'Koleos', 'Mégane', 'Scénic', 'Talisman', 'Trafic', 'Twingo', 'Zoe', '19', '21', '25', 'Avantime', 'Cabriolet', 'Express', 'Fluence', 'Grand', 'Grand Espace', 'Grand Kangoo', 'Grand Modus', 'Kangoo Be Bop', 'Laguna', 'Latitude', 'Modus', 'Safrane', 'Scénic RX4', 'Scenic Xmod', 'Spider', 'Super 5', 'Twizy', 'Vel Satis', 'Wind'];
    $models['Rolls-Royce'] = ['Cullinan', 'Dawn', 'Ghost', 'Phantom', 'Wraith', 'Berline', 'Cabriolet', 'Corniche', 'Park Ward', 'Silver Seraph'];
    $models['Saab'] = ['9-3', '9-3X', '9-4X', '9-5', '9-7X', '900', '9000'];
    $models['Seat'] = ['Alhambra', 'Arona', 'Ateca', 'Ibiza', 'Leon', 'Mii', 'Tarraco', 'Altea', 'Altea XL', 'Arosa', 'Cordoba', 'Exeo', 'Inca', 'Marbella', 'Toledo'];
    $models['Skoda'] = ['Citigo', 'Fabia', 'Kamiq', 'Karoq', 'Kodiaq', 'Octavia', 'Scala', 'Superb', 'Favorit', 'Felicia', 'Rapid', 'Roomster', 'Yeti'];
    $models['Smart'] = ['Forfour', 'Fortwo', 'Roadster'];
    $models['Ssangyong'] = ['Korando', 'Tivoli', 'Actyon', 'Actyon Sports', 'Family', 'Kyron', 'Musso', 'Rexton', 'Rodius', 'XLV'];
    $models['Subaru'] = ['BRZ', 'Forester', 'Impreza', 'Levorg', 'Outback', 'XV', 'B9 Tribeca', 'E', 'Justy', 'Legacy', 'Mini Jumbo', 'Série L', 'SVX', 'Trezia', 'Tribeca', 'Vivio', 'Wrx', 'WRX STi'];
    $models['Suzuki'] = ['Ignis', 'Jimny', 'Swift', 'SX4 S-Cross', 'Vitara', 'Alto', 'Baleno', 'Carry', 'Celerio', 'Grand Vitara', 'Liana', 'Samurai', 'Splash', 'SX4', 'Wagon-R', 'X-90'];
    $models['Tesla'] = ['Model 3', 'Model S', 'Model x'];
    $models['Toyota'] = ['Aygo', 'C-HR', 'Camry', 'Corolla', 'Grand Prius+', 'GT86', 'Land Cruiser', 'Prius', 'Proace city verso', 'Proace verso', 'RAV4', 'Supra', 'Yaris', '4-Runner', 'Auris', 'Avensis', 'Carina', 'Celica', 'Hilux', 'iQ', 'Land Cruiser V8', 'MR 2', 'MR Roadster', 'Paseo', 'Picnic', 'Previa', 'Starlet', 'Urban Cruiser', 'Verso', 'Verso-S'];
    $models['Volkswagen'] = ['Arteon', 'Golf', 'Id.3', 'Passat', 'Polo', 'Sharan', 'T-cross', 'T-roc', 'Tiguan', 'Tiguan Allspace', 'Touareg', 'Touran', 'Up!', 'Amarok', 'Beetle', 'Bora', 'Caddy', 'Caravelle', 'CC', 'Corrado', 'EOS', 'Fox', 'Jetta', 'Lupo', 'Multivan', 'Phaeton', 'Scirocco', 'Vento'];
    $models['Volvo'] = ['S60', 'S90', 'V60', 'V90', 'XC40', 'XC60', 'XC90', '240', '440', '460', '480', '740', '850', '940', '960', 'C30', 'C70', 'Polar', 'S40', 'S70', 'S80', 'V40', 'V50', 'V70', 'XC70'];
    return $models[$model];
}

function modereglement()
{
    return array('Espece' => 'Espece', 'Carte Bancaire' => 'Carte Bancaire', 'Virement' => 'Virement', 'Cheque' => 'Cheque');
}

function voiturecategories()
{
    return array('Large' => 'Large', 'Mini' => 'Mini', 'Compact' => 'Compact');
}

function voiturecouleurs()
{
    return array('Noir' => 'Noir', 'Gris' => 'Gris', 'Blanc' => 'Blanc', 'Rouge' => 'Rouge', 'Blue' => 'Blue');
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function optionmode()
{
    return array('par reservation' => 'Par réservation', 'par jour' => 'Par jour');
}

function listBoolean()
{
    return array('0' => 'Non', '1' => 'Oui');
}

function typeassurance()
{
    return array('Assurance au tiers' => 'Assurance au tiers', 'Assurance au tiers plus' => 'Assurance au tiers plus', 'Assurance tous risques' => 'Assurance tous risques', 'Assurance temporaire' => 'Assurance temporaire');
}
