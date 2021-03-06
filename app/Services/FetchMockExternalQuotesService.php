<?php

namespace App\Services;

use App\Contracts\FetchExternalQuotesContract;

class FetchMockExternalQuotesService implements FetchExternalQuotesContract {

    public function fetch(): object{
        $quotes = json_decode('{
            "USDAED": 3.672965,
            "USDAFN": 87.826899,
            "USDALL": 111.982756,
            "USDAMD": 478.306722,
            "USDANG": 1.818266,
            "USDAOA": 421.380501,
            "USDARS": 113.922597,
            "USDAUD": 1.350722,
            "USDAWG": 1.8,
            "USDAZN": 1.641137,
            "USDBAM": 1.80932,
            "USDBBD": 2.036993,
            "USDBDT": 87.110182,
            "USDBGN": 1.807402,
            "USDBHD": 0.377709,
            "USDBIF": 2070.592371,
            "USDBMD": 1,
            "USDBND": 1.366063,
            "USDBOB": 6.946044,
            "USDBRL": 4.702203,
            "USDBSD": 1.008909,
            "USDBTC": 2.4802741e-5,
            "USDBTN": 76.79143,
            "USDBWP": 11.643154,
            "USDBYN": 3.342923,
            "USDBYR": 19600,
            "USDBZD": 2.033571,
            "USDCAD": 1.25957,
            "USDCDF": 2012.999926,
            "USDCHF": 0.94228,
            "USDCLF": 0.029551,
            "USDCLP": 815.400515,
            "USDCNY": 6.371601,
            "USDCOP": 3739,
            "USDCRC": 657.659574,
            "USDCUC": 1,
            "USDCUP": 26.5,
            "USDCVE": 102.005606,
            "USDCZK": 22.62305,
            "USDDJF": 179.60222,
            "USDDKK": 6.879501,
            "USDDOP": 55.497789,
            "USDDZD": 143.959038,
            "USDEGP": 18.425699,
            "USDERN": 15.000002,
            "USDETB": 51.923829,
            "USDEUR": 0.92485,
            "USDFJD": 2.10175,
            "USDFKP": 0.768642,
            "USDGBP": 0.76497,
            "USDGEL": 3.064976,
            "USDGGP": 0.768642,
            "USDGHS": 7.667501,
            "USDGIP": 0.768642,
            "USDGMD": 53.950107,
            "USDGNF": 8987.409689,
            "USDGTQ": 7.727895,
            "USDGYD": 211.070664,
            "USDHKD": 7.84355,
            "USDHNL": 24.760407,
            "USDHRK": 6.982099,
            "USDHTG": 109.461785,
            "USDHUF": 347.780129,
            "USDIDR": 14367,
            "USDILS": 3.218105,
            "USDIMP": 0.768642,
            "USDINR": 76.303998,
            "USDIQD": 1471.733703,
            "USDIRR": 42250.000279,
            "USDISK": 129.829709,
            "USDJEP": 0.768642,
            "USDJMD": 156.116153,
            "USDJOD": 0.708979,
            "USDJPY": 126.465501,
            "USDKES": 115.450213,
            "USDKGS": 81.430102,
            "USDKHR": 4080.947315,
            "USDKMF": 454.950013,
            "USDKPW": 900.000119,
            "USDKRW": 1228.175027,
            "USDKWD": 0.30501,
            "USDKYD": 0.840715,
            "USDKZT": 457.175631,
            "USDLAK": 11992.858365,
            "USDLBP": 1525.624422,
            "USDLKR": 325.146417,
            "USDLRD": 152.292693,
            "USDLSL": 14.669797,
            "USDLTL": 2.95274,
            "USDLVL": 0.60489,
            "USDLYD": 4.744958,
            "USDMAD": 9.857305,
            "USDMDL": 18.623312,
            "USDMGA": 4079.90046,
            "USDMKD": 56.998941,
            "USDMMK": 1867.934448,
            "USDMNT": 2994.863198,
            "USDMOP": 8.144152,
            "USDMRO": 356.999828,
            "USDMUR": 42.949948,
            "USDMVR": 15.403463,
            "USDMWK": 819.203959,
            "USDMXN": 19.9664,
            "USDMYR": 4.234503,
            "USDMZN": 63.829446,
            "USDNAD": 14.670253,
            "USDNGN": 414.53037,
            "USDNIO": 36.138825,
            "USDNOK": 8.78873,
            "USDNPR": 122.866288,
            "USDNZD": 1.476355,
            "USDOMR": 0.385717,
            "USDPAB": 1.008811,
            "USDPEN": 3.76712,
            "USDPGK": 3.554813,
            "USDPHP": 52.197499,
            "USDPKR": 182.857975,
            "USDPLN": 4.294678,
            "USDPYG": 6920.53654,
            "USDQAR": 3.640977,
            "USDRON": 4.5713,
            "USDRSD": 108.916231,
            "USDRUB": 81.125009,
            "USDRWF": 1026.758251,
            "USDSAR": 3.750294,
            "USDSBD": 7.996864,
            "USDSCR": 14.442384,
            "USDSDG": 447.497886,
            "USDSEK": 9.54267,
            "USDSGD": 1.357025,
            "USDSHP": 1.377398,
            "USDSLL": 12349.99994,
            "USDSOS": 576.493911,
            "USDSRD": 20.708502,
            "USDSTD": 20697.981008,
            "USDSVC": 8.822931,
            "USDSYP": 2512.449491,
            "USDSZL": 14.777493,
            "USDTHB": 33.6797,
            "USDTJS": 12.560362,
            "USDTMT": 3.51,
            "USDTND": 3.001013,
            "USDTOP": 2.266898,
            "USDTRY": 14.6363,
            "USDTTD": 6.851775,
            "USDTWD": 29.1265,
            "USDTZS": 2322.000097,
            "USDUAH": 29.660815,
            "USDUGX": 3551.271318,
            "USDUSD": 1,
            "USDUYU": 41.683548,
            "USDUZS": 11420.324981,
            "USDVEF": 213830222338.07285,
            "USDVND": 22897.5,
            "USDVUV": 112.581651,
            "USDWST": 2.585442,
            "USDXAF": 606.819769,
            "USDXAG": 0.039124,
            "USDXAU": 0.000507,
            "USDXCD": 2.70255,
            "USDXDR": 0.738041,
            "USDXOF": 606.822576,
            "USDXPF": 110.624995,
            "USDYER": 250.250087,
            "USDZAR": 14.643299,
            "USDZMK": 9001.203383,
            "USDZMW": 17.55385,
            "USDZWL": 321.999592
        }');

        return $quotes;
    }

}
