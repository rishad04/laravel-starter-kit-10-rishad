<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = collect($this->currencies());

        $currencies->each(fn ($currency) =>  Currency::create($currency));
    }

    private function  Currencies(): array
    {
        $currencies = [
            ['name' => 'United Arab Emirates Dirham', 'code' => 'AED', 'symbol' => 'د.إ'],
            ['name' => 'Afghan Afghani', 'code' => 'AFN', 'symbol' => '؋'],
            ['name' => 'Albanian Lek', 'code' => 'ALL', 'symbol' => 'L'],
            ['name' => 'Armenian Dram', 'code' => 'AMD', 'symbol' => '֏'],
            ['name' => 'Netherlands Antillean Guilder', 'code' => 'ANG', 'symbol' => 'ƒ'],
            ['name' => 'Angolan Kwanza', 'code' => 'AOA', 'symbol' => 'Kz'],
            ['name' => 'Argentine Peso', 'code' => 'ARS', 'symbol' => '$'],
            ['name' => 'Australian Dollar', 'code' => 'AUD', 'symbol' => '$'],
            ['name' => 'Aruban Florin', 'code' => 'AWG', 'symbol' => 'ƒ'],
            ['name' => 'Azerbaijani Manat', 'code' => 'AZN', 'symbol' => '₼'],
            ['name' => 'Bosnia-Herzegovina Convertible Mark', 'code' => 'BAM', 'symbol' => 'KM'],
            ['name' => 'Barbadian Dollar', 'code' => 'BBD', 'symbol' => '$'],
            ['name' => 'Bangladeshi Taka', 'code' => 'BDT', 'symbol' => '৳'],
            ['name' => 'Bulgarian Lev', 'code' => 'BGN', 'symbol' => 'лв'],
            ['name' => 'Bahraini Dinar', 'code' => 'BHD', 'symbol' => 'ب.د'],
            ['name' => 'Burundian Franc', 'code' => 'BIF', 'symbol' => 'Fr'],
            ['name' => 'Bermudan Dollar', 'code' => 'BMD', 'symbol' => '$'],
            ['name' => 'Brunei Dollar', 'code' => 'BND', 'symbol' => '$'],
            ['name' => 'Bolivian Boliviano', 'code' => 'BOB', 'symbol' => 'Bs.'],
            ['name' => 'Brazilian Real', 'code' => 'BRL', 'symbol' => 'R$'],
            ['name' => 'Bahamian Dollar', 'code' => 'BSD', 'symbol' => '$'],
            ['name' => 'Bitcoin', 'code' => 'BTC', 'symbol' => '฿'],
            ['name' => 'Bhutanese Ngultrum', 'code' => 'BTN', 'symbol' => 'Nu.'],
            ['name' => 'Botswanan Pula', 'code' => 'BWP', 'symbol' => 'P'],
            ['name' => 'Belarusian Ruble', 'code' => 'BYN', 'symbol' => 'Br'],
            ['name' => 'Belize Dollar', 'code' => 'BZD', 'symbol' => '$'],
            ['name' => 'Canadian Dollar', 'code' => 'CAD', 'symbol' => '$'],
            ['name' => 'Congolese Franc', 'code' => 'CDF', 'symbol' => 'FC'],
            ['name' => 'Swiss Franc', 'code' => 'CHF', 'symbol' => 'CHF'],
            ['name' => 'Chilean Unit of Account (UF)', 'code' => 'CLF', 'symbol' => 'CLF'],
            ['name' => 'Chilean Peso', 'code' => 'CLP', 'symbol' => '$'],
            ['name' => 'Chinese Yuan (Offshore)', 'code' => 'CNH', 'symbol' => '¥'],
            ['name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥'],
            ['name' => 'Colombian Peso', 'code' => 'COP', 'symbol' => '$'],
            ['name' => 'Costa Rican Colón', 'code' => 'CRC', 'symbol' => '₡'],
            ['name' => 'Cuban Convertible Peso', 'code' => 'CUC', 'symbol' => 'CUC'],
            ['name' => 'Cuban Peso', 'code' => 'CUP', 'symbol' => '₱'],
            ['name' => 'Cape Verdean Escudo', 'code' => 'CVE', 'symbol' => 'Esc'],
            ['name' => 'Czech Republic Koruna', 'code' => 'CZK', 'symbol' => 'Kč'],
            ['name' => 'Djiboutian Franc', 'code' => 'DJF', 'symbol' => 'Fr'],
            ['name' => 'Danish Krone', 'code' => 'DKK', 'symbol' => 'kr'],
            ['name' => 'Dominican Peso', 'code' => 'DOP', 'symbol' => 'RD$'],
            ['name' => 'Algerian Dinar', 'code' => 'DZD', 'symbol' => 'د.ج'],
            ['name' => 'Egyptian Pound', 'code' => 'EGP', 'symbol' => 'E£'],
            ['name' => 'Eritrean Nakfa', 'code' => 'ERN', 'symbol' => 'Nfk'],
            ['name' => 'Ethiopian Birr', 'code' => 'ETB', 'symbol' => 'Br'],
            ['name' => 'Euro', 'code' => 'EUR', 'symbol' => '€'],
            ['name' => 'Fijian Dollar', 'code' => 'FJD', 'symbol' => '$'],
            ['name' => 'Falkland Islands Pound', 'code' => 'FKP', 'symbol' => '£'],
            ['name' => 'British Pound Sterling', 'code' => 'GBP', 'symbol' => '£'],
            ['name' => 'Georgian Lari', 'code' => 'GEL', 'symbol' => '₾'],
            ['name' => 'Guernsey Pound', 'code' => 'GGP', 'symbol' => '£'],
            ['name' => 'Ghanaian Cedi', 'code' => 'GHS', 'symbol' => '₵'],
            ['name' => 'Gibraltar Pound', 'code' => 'GIP', 'symbol' => '£'],
            ['name' => 'Gambian Dalasi', 'code' => 'GMD', 'symbol' => 'D'],
            ['name' => 'Guinean Franc', 'code' => 'GNF', 'symbol' => 'Fr'],
            ['name' => 'Guatemalan Quetzal', 'code' => 'GTQ', 'symbol' => 'Q'],
            ['name' => 'Guyanaese Dollar', 'code' => 'GYD', 'symbol' => '$'],
            ['name' => 'Hong Kong Dollar', 'code' => 'HKD', 'symbol' => '$'],
            ['name' => 'Honduran Lempira', 'code' => 'HNL', 'symbol' => 'L'],
            ['name' => 'Croatian Kuna', 'code' => 'HRK', 'symbol' => 'kn'],
            ['name' => 'Haitian Gourde', 'code' => 'HTG', 'symbol' => 'G'],
            ['name' => 'Hungarian Forint', 'code' => 'HUF', 'symbol' => 'Ft'],
            ['name' => 'Indonesian Rupiah', 'code' => 'IDR', 'symbol' => 'Rp'],
            ['name' => 'Israeli New Sheqel', 'code' => 'ILS', 'symbol' => '₪'],
            ['name' => 'Manx pound', 'code' => 'IMP', 'symbol' => '£'],
            ['name' => 'Indian Rupee', 'code' => 'INR', 'symbol' => '₹'],
            ['name' => 'Iraqi Dinar', 'code' => 'IQD', 'symbol' => 'ع.د'],
            ['name' => 'Iranian Rial', 'code' => 'IRR', 'symbol' => '﷼'],
            ['name' => 'Icelandic Króna', 'code' => 'ISK', 'symbol' => 'kr'],
            ['name' => 'Jersey Pound', 'code' => 'JEP', 'symbol' => '£'],
            ['name' => 'Jamaican Dollar', 'code' => 'JMD', 'symbol' => 'J$'],
            ['name' => 'Jordanian Dinar', 'code' => 'JOD', 'symbol' => 'د.ا'],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥'],
            ['name' => 'Kenyan Shilling', 'code' => 'KES', 'symbol' => 'Ksh'],
            ['name' => 'Kyrgystani Som', 'code' => 'KGS', 'symbol' => 'сом'],
            ['name' => 'Cambodian Riel', 'code' => 'KHR', 'symbol' => '៛'],
            ['name' => 'Comorian Franc', 'code' => 'KMF', 'symbol' => 'Fr'],
            ['name' => 'North Korean Won', 'code' => 'KPW', 'symbol' => '₩'],
            ['name' => 'South Korean Won', 'code' => 'KRW', 'symbol' => '₩'],
            ['name' => 'Kuwaiti Dinar', 'code' => 'KWD', 'symbol' => 'د.ك'],
            ['name' => 'Cayman Islands Dollar', 'code' => 'KYD', 'symbol' => '$'],
            ['name' => 'Kazakhstani Tenge', 'code' => 'KZT', 'symbol' => '₸'],
            ['name' => 'Laotian Kip', 'code' => 'LAK', 'symbol' => '₭'],
            ['name' => 'Lebanese Pound', 'code' => 'LBP', 'symbol' => 'ل.ل'],
            ['name' => 'Sri Lankan Rupee', 'code' => 'LKR', 'symbol' => 'රු'],
            ['name' => 'Liberian Dollar', 'code' => 'LRD', 'symbol' => '$'],
            ['name' => 'Lesotho Loti', 'code' => 'LSL', 'symbol' => 'M'],
            ['name' => 'Libyan Dinar', 'code' => 'LYD', 'symbol' => 'ل.د'],
            ['name' => 'Moroccan Dirham', 'code' => 'MAD', 'symbol' => 'د.م.'],
            ['name' => 'Moldovan Leu', 'code' => 'MDL', 'symbol' => 'L'],
            ['name' => 'Malagasy Ariary', 'code' => 'MGA', 'symbol' => 'Ar'],
            ['name' => 'Macedonian Denar', 'code' => 'MKD', 'symbol' => 'ден'],
            ['name' => 'Myanma Kyat', 'code' => 'MMK', 'symbol' => 'K'],
            ['name' => 'Mongolian Tugrik', 'code' => 'MNT', 'symbol' => '₮'],
            ['name' => 'Macanese Pataca', 'code' => 'MOP', 'symbol' => 'P'],
            ['name' => 'Mauritanian Ouguiya', 'code' => 'MRU', 'symbol' => 'UM'],
            ['name' => 'Mauritian Rupee', 'code' => 'MUR', 'symbol' => '₨'],
            ['name' => 'Maldivian Rufiyaa', 'code' => 'MVR', 'symbol' => 'ރ.'],
            ['name' => 'Malawian Kwacha', 'code' => 'MWK', 'symbol' => 'MK'],
            ['name' => 'Mexican Peso', 'code' => 'MXN', 'symbol' => '$'],
            ['name' => 'Malaysian Ringgit', 'code' => 'MYR', 'symbol' => 'RM'],
            ['name' => 'Mozambican Metical', 'code' => 'MZN', 'symbol' => 'MT'],
            ['name' => 'Namibian Dollar', 'code' => 'NAD', 'symbol' => '$'],
            ['name' => 'Nigerian Naira', 'code' => 'NGN', 'symbol' => '₦'],
            ['name' => 'Nicaraguan Córdoba', 'code' => 'NIO', 'symbol' => 'C$'],
            ['name' => 'Norwegian Krone', 'code' => 'NOK', 'symbol' => 'kr'],
            ['name' => 'Nepalese Rupee', 'code' => 'NPR', 'symbol' => '₨'],
            ['name' => 'New Zealand Dollar', 'code' => 'NZD', 'symbol' => '$'],
            ['name' => 'Omani Rial', 'code' => 'OMR', 'symbol' => 'ر.ع.'],
            ['name' => 'Panamanian Balboa', 'code' => 'PAB', 'symbol' => 'B/.'],
            ['name' => 'Peruvian Nuevo Sol', 'code' => 'PEN', 'symbol' => 'S/.'],
            ['name' => 'Papua New Guinean Kina', 'code' => 'PGK', 'symbol' => 'K'],
            ['name' => 'Philippine Peso', 'code' => 'PHP', 'symbol' => '₱'],
            ['name' => 'Pakistani Rupee', 'code' => 'PKR', 'symbol' => '₨'],
            ['name' => 'Polish Zloty', 'code' => 'PLN', 'symbol' => 'zł'],
            ['name' => 'Paraguayan Guarani', 'code' => 'PYG', 'symbol' => '₲'],
            ['name' => 'Qatari Rial', 'code' => 'QAR', 'symbol' => 'ر.ق'],
            ['name' => 'Romanian Leu', 'code' => 'RON', 'symbol' => 'lei'],
            ['name' => 'Serbian Dinar', 'code' => 'RSD', 'symbol' => 'дин'],
            ['name' => 'Russian Ruble', 'code' => 'RUB', 'symbol' => '₽'],
            ['name' => 'Rwandan Franc', 'code' => 'RWF', 'symbol' => 'Fr'],
            ['name' => 'Saudi Riyal', 'code' => 'SAR', 'symbol' => 'ر.س'],
            ['name' => 'Solomon Islands Dollar', 'code' => 'SBD', 'symbol' => '$'],
            ['name' => 'Seychellois Rupee', 'code' => 'SCR', 'symbol' => '₨'],
            ['name' => 'Sudanese Pound', 'code' => 'SDG', 'symbol' => 'ج.س.'],
            ['name' => 'Swedish Krona', 'code' => 'SEK', 'symbol' => 'kr'],
            ['name' => 'Singapore Dollar', 'code' => 'SGD', 'symbol' => '$'],
            ['name' => 'Saint Helena Pound', 'code' => 'SHP', 'symbol' => '£'],
            ['name' => 'Sierra Leonean Leone', 'code' => 'SLL', 'symbol' => 'Le'],
            ['name' => 'Somali Shilling', 'code' => 'SOS', 'symbol' => 'Sh'],
            ['name' => 'Surinamese Dollar', 'code' => 'SRD', 'symbol' => '$'],
            ['name' => 'South Sudanese Pound', 'code' => 'SSP', 'symbol' => '£'],
            ['name' => 'São Tomé and Príncipe Dobra (pre-2018)', 'code' => 'STD', 'symbol' => 'Db'],
            ['name' => 'São Tomé and Príncipe Dobra', 'code' => 'STN', 'symbol' => 'Db'],
            ['name' => 'Salvadoran Colón', 'code' => 'SVC', 'symbol' => '$'],
            ['name' => 'Syrian Pound', 'code' => 'SYP', 'symbol' => '£'],
            ['name' => 'Swazi Lilangeni', 'code' => 'SZL', 'symbol' => 'L'],
            ['name' => 'Thai Baht', 'code' => 'THB', 'symbol' => '฿'],
            ['name' => 'Tajikistani Somoni', 'code' => 'TJS', 'symbol' => 'ЅМ'],
            ['name' => 'Turkmenistani Manat', 'code' => 'TMT', 'symbol' => 'm'],
            ['name' => 'Tunisian Dinar', 'code' => 'TND', 'symbol' => 'د.ت'],
            ['name' => 'Tongan Pa\'anga', 'code' => 'TOP', 'symbol' => 'T$'],
            ['name' => 'Turkish Lira', 'code' => 'TRY', 'symbol' => '₺'],
            ['name' => 'Trinidad and Tobago Dollar', 'code' => 'TTD', 'symbol' => 'TT$'],
            ['name' => 'New Taiwan Dollar', 'code' => 'TWD', 'symbol' => 'NT$'],
            ['name' => 'Tanzanian Shilling', 'code' => 'TZS', 'symbol' => 'Sh'],
            ['name' => 'Ukrainian Hryvnia', 'code' => 'UAH', 'symbol' => '₴'],
            ['name' => 'Ugandan Shilling', 'code' => 'UGX', 'symbol' => 'Sh'],
            ['name' => 'United States Dollar', 'code' => 'USD', 'symbol' => '$'],
            ['name' => 'Uruguayan Peso', 'code' => 'UYU', 'symbol' => '$U'],
            ['name' => 'Uzbekistan Som', 'code' => 'UZS', 'symbol' => 'лв'],
            ['name' => 'Venezuelan Bolívar Fuerte (Old)', 'code' => 'VEF', 'symbol' => 'Bs'],
            ['name' => 'Venezuelan Bolívar Soberano', 'code' => 'VES', 'symbol' => 'Bs'],
            ['name' => 'Vietnamese Dong', 'code' => 'VND', 'symbol' => '₫'],
            ['name' => 'Vanuatu Vatu', 'code' => 'VUV', 'symbol' => 'Vt'],
            ['name' => 'Samoan Tala', 'code' => 'WST', 'symbol' => 'T'],
            ['name' => 'CFA Franc BEAC', 'code' => 'XAF', 'symbol' => 'Fr'],
            ['name' => 'Silver Ounce', 'code' => 'XAG', 'symbol' => 'Ag'],
            ['name' => 'Gold Ounce', 'code' => 'XAU', 'symbol' => 'Au'],
            ['name' => 'East Caribbean Dollar', 'code' => 'XCD', 'symbol' => '$'],
            ['name' => 'Special Drawing Rights', 'code' => 'XDR', 'symbol' => 'SDR'],
            ['name' => 'CFA Franc BCEAO', 'code' => 'XOF', 'symbol' => 'Fr'],
            ['name' => 'Palladium Ounce', 'code' => 'XPD', 'symbol' => 'Pd'],
            ['name' => 'CFP Franc', 'code' => 'XPF', 'symbol' => '₣'],
            ['name' => 'Platinum Ounce', 'code' => 'XPT', 'symbol' => 'Pt'],
            ['name' => 'Yemeni Rial', 'code' => 'YER', 'symbol' => '﷼'],
            ['name' => 'South African Rand', 'code' => 'ZAR', 'symbol' => 'R'],
            ['name' => 'Zambian Kwacha', 'code' => 'ZMW', 'symbol' => 'ZK'],
            ['name' => 'Zimbabwean Dollar', 'code' => 'ZWL', 'symbol' => '$'],
        ];

        return $currencies;
    }
}