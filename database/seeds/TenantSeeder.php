<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client\Race;
use App\Models\Client\Nationality;
use App\Models\Client\MartialStatus;
use App\Models\Client\Instruction;
use App\Models\Client\Kinship;
use App\Models\Client\PhysicalDisability;
use App\Models\Client\PublicPlace;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->runRacesSeeder();

        $this->runNationalitiesSeeder();

        $this->runMartialStatusesSeeder();

        $this->runInstructionsSeeder();

        $this->runKinshipsSeeder();

        $this->runPhysicalDisabilities();

        $this->runPublicsPlacesSeeder();

        $this->runPermissionAndRolesSeeder();

    }

    public function runRacesSeeder()
    {
        Race::create([
            'codigo' => '1',
            'nome' => 'Indígena',
        ]);

        Race::create([
            'codigo' => '2',
            'nome' => 'Branca',
        ]);

        Race::create([
            'codigo' => '4',
            'nome' => 'Preta',
        ]);

        Race::create([
            'codigo' => '6',
            'nome' => 'Amarela',
        ]);

        Race::create([
            'codigo' => '8',
            'nome' => 'Parda',
        ]);

        Race::create([
            'codigo' => '9',
            'nome' => 'Não Informada',
        ]);

    }

    public function runNationalitiesSeeder()
    {
        Nationality::create([
            'codigo' => '10',
            'nome' => 'Brasileiro Nato',
        ]);

        Nationality::create([
            'codigo' => '20',
            'nome' => 'Brasileiro Naturalizado',
        ]);

        Nationality::create([
            'codigo' => '21',
            'nome' => 'Argentino',
        ]);

        Nationality::create([
            'codigo' => '22',
            'nome' => 'Boliviano',
        ]);

        Nationality::create([
            'codigo' => '23',
            'nome' => 'Chileno',
        ]);

        Nationality::create([
            'codigo' => '24',
            'nome' => 'Paraguaio',
        ]);

        Nationality::create([
            'codigo' => '25',
            'nome' => 'Uruguaio',
        ]);

        Nationality::create([
            'codigo' => '26',
            'nome' => 'Venezuelano',
        ]);

        Nationality::create([
            'codigo' => '27',
            'nome' => 'Colombiano',
        ]);

        Nationality::create([
            'codigo' => '28',
            'nome' => 'Peruano',
        ]);

        Nationality::create([
            'codigo' => '29',
            'nome' => 'Equatoriano',
        ]);

        Nationality::create([
            'codigo' => '30',
            'nome' => 'Alemão',
        ]);

        Nationality::create([
            'codigo' => '31',
            'nome' => 'Belga',
        ]);

        Nationality::create([
            'codigo' => '32',
            'nome' => 'Britânico',
        ]);

        Nationality::create([
            'codigo' => '34',
            'nome' => 'Canadense',
        ]);

        Nationality::create([
            'codigo' => '35',
            'nome' => 'Espanhol',
        ]);

        Nationality::create([
            'codigo' => '36',
            'nome' => 'Estadunindense (EUA)',
        ]);

        Nationality::create([
            'codigo' => '37',
            'nome' => 'Frances',
        ]);

        Nationality::create([
            'codigo' => '38',
            'nome' => 'Suiço',
        ]);

        Nationality::create([
            'codigo' => '39',
            'nome' => 'Italiano',
        ]);

        Nationality::create([
            'codigo' => '40',
            'nome' => 'Haitiano',
        ]);

        Nationality::create([
            'codigo' => '41',
            'nome' => 'Japonês',
        ]);

        Nationality::create([
            'codigo' => '42',
            'nome' => 'Chinês',
        ]);

        Nationality::create([
            'codigo' => '43',
            'nome' => 'Coreano',
        ]);

        Nationality::create([
            'codigo' => '44',
            'nome' => 'Russo',
        ]);

        Nationality::create([
            'codigo' => '45',
            'nome' => 'Português',
        ]);

        Nationality::create([
            'codigo' => '46',
            'nome' => 'Paquistanês',
        ]);

        Nationality::create([
            'codigo' => '47',
            'nome' => 'Indiano',
        ]);

        Nationality::create([
            'codigo' => '48',
            'nome' => 'Outros latino-americanos',
        ]);

        Nationality::create([
            'codigo' => '49',
            'nome' => 'Outros asiáticos',
        ]);

        Nationality::create([
            'codigo' => '50',
            'nome' => 'Outros',
        ]);

        Nationality::create([
            'codigo' => '51',
            'nome' => 'Outros europeus',
        ]);

        Nationality::create([
            'codigo' => '60',
            'nome' => 'Angolano',
        ]);

        Nationality::create([
            'codigo' => '61',
            'nome' => 'Congolês',
        ]);

        Nationality::create([
            'codigo' => '62',
            'nome' => 'Sul-Africano',
        ]);

        Nationality::create([
            'codigo' => '70',
            'nome' => 'Outros Africanos',
        ]);
    }

    public function runMartialStatusesSeeder()
    {
        MartialStatus::create([
            'codigo' => '1',
            'nome' => 'Solteiro',
        ]);

        MartialStatus::create([
            'codigo' => '2',
            'nome' => 'Casado',
        ]);

        MartialStatus::create([
            'codigo' => '3',
            'nome' => 'Viúvo',
        ]);

        MartialStatus::create([
            'codigo' => '4',
            'nome' => 'Separado',
        ]);

        MartialStatus::create([
            'codigo' => '5',
            'nome' => 'Divorciado',
        ]);

        MartialStatus::create([
            'codigo' => '6',
            'nome' => 'União estável',
        ]);

        MartialStatus::create([
            'codigo' => '7',
            'nome' => 'Concubinato',
        ]);

        MartialStatus::create([
            'codigo' => '8',
            'nome' => 'Outros',
        ]);

        MartialStatus::create([
            'codigo' => '9',
            'nome' => 'Ignorado',
        ]);
    }

    public function runInstructionsSeeder()
    {
        Instruction::create([
            'codigo' => '01',
            'nome' => 'Analfabeto, inclusive o que, embora tenha recebido instrução, não se alfabetizou.',
        ]);

        Instruction::create([
            'codigo' => '02',
            'nome' => 'Até o 5º ano incompleto do ensino fundamental (antiga 4ª série) que se tenha alfabetizado sem ter frequentado escola regular.',
        ]);

        Instruction::create([
            'codigo' => '03',
            'nome' => '5º ano completo do ensino fundamental.',
        ]);

        Instruction::create([
            'codigo' => '04',
            'nome' => 'Do 6º ao 9º ano do ensino fundamental (antiga 5ª a 8ª série).',
        ]);

        Instruction::create([
            'codigo' => '05',
            'nome' => 'Ensino fundamental completo.',
        ]);

        Instruction::create([
            'codigo' => '06',
            'nome' => 'Ensino médio incompleto.',
        ]);

        Instruction::create([
            'codigo' => '07',
            'nome' => 'Ensino médio completo.',
        ]);

        Instruction::create([
            'codigo' => '08',
            'nome' => 'Educação superior incompleta.',
        ]);

        Instruction::create([
            'codigo' => '09',
            'nome' => 'Educação superior completa.',
        ]);

        Instruction::create([
            'codigo' => '10',
            'nome' => 'Mestrado completo.',
        ]);

        Instruction::create([
            'codigo' => '10',
            'nome' => 'Doutorado completo.',
        ]);
    }

    public function runKinshipsSeeder()
    {
        Kinship::create([
            'codigo' => '00',
            'nome' => 'Outros',
        ]);

        Kinship::create([
            'codigo' => '01',
            'nome' => 'Cônjuge',
        ]);

        Kinship::create([
            'codigo' => '02',
            'nome' => 'Companheiro',
        ]);

        Kinship::create([
            'codigo' => '03',
            'nome' => 'Filho(a) não emancipado menor de 21 Anos',
        ]);

        Kinship::create([
            'codigo' => '04',
            'nome' => 'Filho(a) Inválido(a)',
        ]);

        Kinship::create([
            'codigo' => '05',
            'nome' => 'Pai(Mãe) com dependência Econômica',
        ]);

        Kinship::create([
            'codigo' => '06',
            'nome' => 'Irmão não emancipado menor de 21 Anos com dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '07',
            'nome' => 'Irmão inválido com dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '08',
            'nome' => 'Enteado não emancipado menor de 21 Anos com dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '09',
            'nome' => 'Enteado inválido com dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '10',
            'nome' => 'Menor tutelado não emancipado menor de 21 anos c/dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '11',
            'nome' => 'Menor tutelado inválido com dependência econômica',
        ]);

        Kinship::create([
            'codigo' => '12',
            'nome' => 'PAI',
        ]);

        Kinship::create([
            'codigo' => '13',
            'nome' => 'MÃE',
        ]);

        Kinship::create([
            'codigo' => '14',
            'nome' => 'Filho(a) maior de 21 anos',
        ]);

        Kinship::create([
            'codigo' => '15',
            'nome' => 'Neto(a)',
        ]);
    }

    public function runPhysicalDisabilities()
    {
        PhysicalDisability::create([
            'codigo' => '0',
            'nome' => 'Nenhuma',
        ]);

        PhysicalDisability::create([
            'codigo' => '1',
            'nome' => 'Física',
        ]);

        PhysicalDisability::create([
            'codigo' => '2',
            'nome' => 'Auditiva',
        ]);

        PhysicalDisability::create([
            'codigo' => '3',
            'nome' => 'Visual',
        ]);

        PhysicalDisability::create([
            'codigo' => '4',
            'nome' => 'Intelectual',
        ]);

        PhysicalDisability::create([
            'codigo' => '5',
            'nome' => 'Múltipla',
        ]);

        PhysicalDisability::create([
            'codigo' => '6',
            'nome' => 'Reabilitado',
        ]);
    }

    public function runPublicsPlacesSeeder()
    {
        PublicPlace::create([
            'codigo'    => 'A',
            'nome'      =>  'Área'
        ]);

        PublicPlace::create([
            'codigo'    => 'AC',
            'nome'      =>  'Acesso',
        ]);

        PublicPlace::create([
            'codigo'    => 'ACA',
            'nome'      => 'Acampamento',
        ]);

        PublicPlace::create([
            'codigo'    => 'ACL',
            'nome'      => 'Acesso Local',
        ]);

        PublicPlace::create([
            'codigo'    => 'AD',
            'nome'      => 'Adro',
        ]);

        PublicPlace::create([
            'codigo'    => 'AE',
            'nome'      => 'Área Especial',
        ]);

        PublicPlace::create([
            'codigo'    => 'AER',
            'nome'      => 'Aeroporto',
        ]);

        PublicPlace::create([
            'codigo'    => 'AL',
            'nome'      => 'Alameda',
        ]);

        PublicPlace::create([
            'codigo'    => 'AMD',
            'nome'      => 'Avenida Marginal Direita',
        ]);

        PublicPlace::create([
            'codigo'    => 'AME',
            'nome'      => 'Avenida Marginal Esquerda',
        ]);

        PublicPlace::create([
            'codigo'    => 'AN',
            'nome'      => 'Anel Viário',
        ]);

        PublicPlace::create([
            'codigo'    => 'ANT',
            'nome'      => 'Antiga Estrada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ART',
            'nome'      => 'Artéria',
        ]);

        PublicPlace::create([
            'codigo'    => 'AT',
            'nome'      => 'Alto',
        ]);

        PublicPlace::create([
            'codigo'    => 'ATL',
            'nome'      => 'Atalho',
        ]);

        PublicPlace::create([
            'codigo'    => 'A V',
            'nome'      => 'Área Verde',
        ]);
       
        PublicPlace::create([
            'codigo'    => 'AV',
            'nome'      => 'Avenida',
        ]);

        PublicPlace::create([
            'codigo'    => 'AVC',
            'nome'      => 'Avenida Contorno',
        ]);

        PublicPlace::create([
            'codigo'    => 'AVM',
            'nome'      => 'Avenida Marginal',
        ]);

        PublicPlace::create([
            'codigo'    => 'AVV',
            'nome'      => 'Avenida Velha',
        ]);

        PublicPlace::create([
            'codigo'    => 'BAL',
            'nome'      => 'Balneário',
        ]);

        PublicPlace::create([
            'codigo'    => 'BC',
            'nome'      => 'Beco',
        ]);

        PublicPlace::create([
            'codigo'    => 'BCO',
            'nome'      => 'Buraco',
        ]);

        PublicPlace::create([
            'codigo'    => 'BEL',
            'nome'      => 'Belvedere',
        ]);

        PublicPlace::create([
            'codigo'    => 'BL',
            'nome'      => 'Bloco',
        ]);

        PublicPlace::create([
            'codigo'    => 'BLO',
            'nome'      => 'Balão',
        ]);

        PublicPlace::create([
            'codigo'    => 'BLS',
            'nome'      => 'Blocos',
        ]);

        PublicPlace::create([
            'codigo'    => 'BSQ',
            'nome'      => 'Bosque',
        ]);

        PublicPlace::create([
            'codigo'    => 'BVD',
            'nome'      => 'Boulevard',
        ]);

        PublicPlace::create([
            'codigo'    => 'BX',
            'nome'      => 'Baixa',
        ]);

        PublicPlace::create([
            'codigo'    => 'C',
            'nome'      => 'Cais',
        ]);

        PublicPlace::create([
            'codigo'    => 'CAL',
            'nome'      => 'Calçada',
        ]);

        PublicPlace::create([
            'codigo'    => 'CAM',
            'nome'      => 'Caminho',
        ]);

        PublicPlace::create([
            'codigo'    => 'CAN',
            'nome'      => 'Canal',
        ]);

        PublicPlace::create([
            'codigo'    => 'CH',
            'nome'      => 'Chácara',
        ]);

        PublicPlace::create([
            'codigo'    => 'CHA',
            'nome'      => 'Chapadão',
        ]);

        PublicPlace::create([
            'codigo'    => 'CIC',
            'nome'      => 'Ciclovia',
        ]);

        PublicPlace::create([
            'codigo'    => 'CIR',
            'nome'      => 'Circular',
        ]);

        PublicPlace::create([
            'codigo'    => 'CJ',
            'nome'      => 'Conjunto',
        ]);

        PublicPlace::create([
            'codigo'    => 'CJM',
            'nome'      => 'Conjunto Mutirão',
        ]);

        PublicPlace::create([
            'codigo'    => 'CMP',
            'nome'      => 'Complexo Viário',
        ]);

        PublicPlace::create([
            'codigo'    => 'COL',
            'nome'      => 'Colônia',
        ]);

        PublicPlace::create([
            'codigo'    => 'COM',
            'nome'      => 'Comunidade',
        ]);

        PublicPlace::create([
            'codigo'    => 'CON',
            'nome'      => 'Condomínio',
        ]);

        PublicPlace::create([
            'codigo'    => 'COR',
            'nome'      => 'Corredor',
        ]);

        PublicPlace::create([
            'codigo'    => 'CPO',
            'nome'      => 'Campo',
        ]);

        PublicPlace::create([
            'codigo'    => 'CRG',
            'nome'      => 'Córrego',
        ]);

        PublicPlace::create([
            'codigo'    => 'CTN',
            'nome'      => 'Contorno',
        ]);

        PublicPlace::create([
            'codigo'    => 'DSC',
            'nome'      => 'Descida',
        ]);

        PublicPlace::create([
            'codigo'    => 'DSV',
            'nome'      => 'Desvio',
        ]);

        PublicPlace::create([
            'codigo'    => 'DT',
            'nome'      => 'Distrito',
        ]);

        PublicPlace::create([
            'codigo'    => 'EB',
            'nome'      => 'Entre Bloco',
        ]);

        PublicPlace::create([
            'codigo'    => 'EIM',
            'nome'      => 'Estrada Intermunicipal',
        ]);

        PublicPlace::create([
            'codigo'    => 'ENS',
            'nome'      => 'Enseada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ENS',
            'nome'      => 'Enseada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ENT',
            'nome'      => 'Entrada Particular',
        ]);

        PublicPlace::create([
            'codigo'    => 'EQ',
            'nome'      => 'Entre Quadra',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESC',
            'nome'      => 'Escada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESD',
            'nome'      => 'Escadaria',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESE',
            'nome'      => 'Estrada Estadual',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESI',
            'nome'      => 'Estrada Vicinal',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESL',
            'nome'      => 'Estrada de Ligação',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESM',
            'nome'      => 'Estrada Municipal',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESP',
            'nome'      => 'Esplanada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESS',
            'nome'      => 'Estrada de Servidão',
        ]);

        PublicPlace::create([
            'codigo'    => 'EST',
            'nome'      => 'Estrada',
        ]);

        PublicPlace::create([
            'codigo'    => 'ESV',
            'nome'      => 'Estrada Velha',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETA',
            'nome'      => 'Estrada Antiga',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETC',
            'nome'      => 'Estação',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETD',
            'nome'      => 'Estádio',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETN',
            'nome'      => 'Estância',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETP',
            'nome'      => 'Estrada Particular',
        ]);

        PublicPlace::create([
            'codigo'    => 'ETT',
            'nome'      => 'Estacionamento',
        ]);

        PublicPlace::create([
            'codigo'    => 'EVA',
            'nome'      => 'Evangélica',
        ]);

        PublicPlace::create([
            'codigo'    => 'EVD',
            'nome'      => 'Elevada',
        ]);

        PublicPlace::create([
            'codigo'    => 'EX',
            'nome'      => 'Eixo Industrial',
        ]);

        PublicPlace::create([
            'codigo'    => 'FAV',
            'nome'      => 'Favela',
        ]);

        PublicPlace::create([
            'codigo'    => 'FAZ',
            'nome'      => 'Fazenda',
        ]);

        PublicPlace::create([
            'codigo'    => 'FER',
            'nome'      => 'Ferrovia',
        ]);

        PublicPlace::create([
            'codigo'    => 'FNT',
            'nome'      => 'Fonte',
        ]);

        PublicPlace::create([
            'codigo'    => 'FRA',
            'nome'      => 'Feira',
        ]);

        PublicPlace::create([
            'codigo'    => 'FTE',
            'nome'      => 'Forte',
        ]);

        PublicPlace::create([
            'codigo'    => 'GAL',
            'nome'      => 'Galeria',
        ]);

        PublicPlace::create([
            'codigo'    => 'GJA',
            'nome'      => 'Granja',
        ]);

        PublicPlace::create([
            'codigo'    => 'HAB',
            'nome'      => 'Núcleo Habitacional',
        ]);

        PublicPlace::create([
            'codigo'    => 'IA',
            'nome'      => 'Ilha',
        ]);

        PublicPlace::create([
            'codigo'    => 'IND',
            'nome'      => 'Indeterminado',
        ]);

        PublicPlace::create([
            'codigo'    => 'IOA',
            'nome'      => 'Ilhota',
        ]);

        PublicPlace::create([
            'codigo'    => 'JD',
            'nome'      => 'Jardim',
        ]);

        PublicPlace::create([
            'codigo'    => 'JDE',
            'nome'      => 'Jardinete',
        ]);

        PublicPlace::create([
            'codigo'    => 'LD',
            'nome'      => 'Ladeira',
        ]);

        PublicPlace::create([
            'codigo'    => 'LGA',
            'nome'      => 'Lagoa',
        ]);

        PublicPlace::create([
            'codigo'    => 'LGO',
            'nome'      => 'Lago',
        ]);

        PublicPlace::create([
            'codigo'    => 'LOT',
            'nome'      => 'Loteamento',
        ]);

        PublicPlace::create([
            'codigo'    => 'LRG',
            'nome'      => 'Largo',
        ]);

        PublicPlace::create([
            'codigo'    => 'LT',
            'nome'      => 'Lote',
        ]);

        PublicPlace::create([
            'codigo'    => 'MER',
            'nome'      => 'Mercado',
        ]);

        PublicPlace::create([
            'codigo'    => 'MNA',
            'nome'      => 'Marina',
        ]);
        
        PublicPlace::create([
            'codigo'    => 'MOD',
            'nome'      => 'Modulo',
        ]);

        PublicPlace::create([
            'codigo'    => 'MRG',
            'nome'      => 'Projeção',
        ]);

        PublicPlace::create([
            'codigo'    => 'MRO',
            'nome'      => 'Morro',
        ]);

        PublicPlace::create([
            'codigo'    => 'MTE',
            'nome'      => 'Monte',
        ]);

        PublicPlace::create([
            'codigo'    => 'NUC',
            'nome'      => 'Núcleo',
        ]);

        PublicPlace::create([
            'codigo'    => 'NUR',
            'nome'      => 'Núcleo Rural',
        ]);

        PublicPlace::create([
            'codigo'    => 'O',
            'nome'      => 'Outros',
        ]);

        PublicPlace::create([
            'codigo'    => 'OUT',
            'nome'      => 'Outeiro',
        ]);

        PublicPlace::create([
            'codigo'    => 'PAR',
            'nome'      => 'Paralela',
        ]);

        PublicPlace::create([
            'codigo'    => 'PAS',
            'nome'      => 'Passeio',
        ]);

        PublicPlace::create([
            'codigo'    => 'PAT',
            'nome'      => 'Pátio',
        ]);

        PublicPlace::create([
            'codigo'    => 'PC',
            'nome'      => 'Praça',
        ]);

        PublicPlace::create([
            'codigo'    => 'PCE',
            'nome'      => 'Praça de Esportes',
        ]);

        PublicPlace::create([
            'codigo'    => 'PDA',
            'nome'      => 'Parada',
        ]);

        PublicPlace::create([
            'codigo'    => 'PDO',
            'nome'      => 'Paradouro',
        ]);

        PublicPlace::create([
            'codigo'    => 'PNT',
            'nome'      => 'Ponta',
        ]);

        PublicPlace::create([
            'codigo'    => 'PR',
            'nome'      => 'Praia',
        ]);

        PublicPlace::create([
            'codigo'    => 'PRL',
            'nome'      => 'Prolongamento',
        ]);

        PublicPlace::create([
            'codigo'    => 'PRM',
            'nome'      => 'Parque Municipal',
        ]);

        PublicPlace::create([
            'codigo'    => 'PRQ',
            'nome'      => 'Parque',
        ]);

        PublicPlace::create([
            'codigo'    => 'PRR',
            'nome'      => 'Parque Residencial',
        ]);

        PublicPlace::create([
            'codigo'    => 'PSA',
            'nome'      => 'Passarela',
        ]);

        PublicPlace::create([
            'codigo'    => 'PSG',
            'nome'      => 'Passagem',
        ]);

        PublicPlace::create([
            'codigo'    => 'PSP',
            'nome'      => 'Passagem de Pedestre',
        ]);

        PublicPlace::create([
            'codigo'    => 'PSS',
            'nome'      => 'Passagem Subterrânea',
        ]);

        PublicPlace::create([
            'codigo'    => 'PTE',
            'nome'      => 'Ponte',
        ]);

        PublicPlace::create([
            'codigo'    => 'PTO',
            'nome'      => 'Porto',
        ]);

        PublicPlace::create([
            'codigo'    => 'Q',
            'nome'      => 'Quadra',
        ]);
        
        PublicPlace::create([
            'codigo'    => 'QTA',
            'nome'      => 'Quinta',
        ]);

        PublicPlace::create([
            'codigo'    => 'QTS',
            'nome'      => 'Quintas',
        ]);

        PublicPlace::create([
            'codigo'    => 'R',
            'nome'      => 'Rua',
        ]);

        PublicPlace::create([
            'codigo'    => 'R I',
            'nome'      => 'Rua Integração',
        ]);

        PublicPlace::create([
            'codigo'    => 'R L',
            'nome'      => 'Rua de Ligação',
        ]);

        PublicPlace::create([
            'codigo'    => 'R P',
            'nome'      => 'Rua Particular',
        ]);

        PublicPlace::create([
            'codigo'    => 'R V',
            'nome'      => 'Rua Velha',
        ]);

        PublicPlace::create([
            'codigo'    => 'RAM',
            'nome'      => 'Ramal',
        ]);

        PublicPlace::create([
            'codigo'    => 'RCR',
            'nome'      => 'Recreio',
        ]);

        PublicPlace::create([
            'codigo'    => 'REC',
            'nome'      => 'Recanto',
        ]);

        PublicPlace::create([
            'codigo'    => 'RER',
            'nome'      => 'Retiro',
        ]);

        PublicPlace::create([
            'codigo'    => 'RES',
            'nome'      => 'Residencial',
        ]);

        PublicPlace::create([
            'codigo'    => 'RET',
            'nome'      => 'Reta',
        ]);

        PublicPlace::create([
            'codigo'    => 'RLA',
            'nome'      => 'Ruela',
        ]);

        PublicPlace::create([
            'codigo'    => 'RMP',
            'nome'      => 'Rampa',
        ]);

        PublicPlace::create([
            'codigo'    => 'ROA',
            'nome'      => 'Rodo Anel',
        ]);

        PublicPlace::create([
            'codigo'    => 'ROD',
            'nome'      => 'Rodovia',
        ]);

        PublicPlace::create([
            'codigo'    => 'ROT',
            'nome'      => 'Rotula',
        ]);

        PublicPlace::create([
            'codigo'    => 'RPE',
            'nome'      => 'Rua de Pedestre',
        ]);

        PublicPlace::create([
            'codigo'    => 'RPR',
            'nome'      => 'Margem',
        ]);

        PublicPlace::create([
            'codigo'    => 'RTN',
            'nome'      => 'Retorno',
        ]);

        PublicPlace::create([
            'codigo'    => 'RTT',
            'nome'      => 'Rotatória',
        ]);

        PublicPlace::create([
            'codigo'    => 'SEG',
            'nome'      => 'Segunda Avenida',
        ]);

        PublicPlace::create([
            'codigo'    => 'SIT',
            'nome'      => 'Sitio',
        ]);

        PublicPlace::create([
            'codigo'    => 'SRV',
            'nome'      => 'Servidão',
        ]);

        PublicPlace::create([
            'codigo'    => 'ST',
            'nome'      => 'Setor',
        ]);

        PublicPlace::create([
            'codigo'    => 'SUB',
            'nome'      => 'Subida',
        ]);

        PublicPlace::create([
            'codigo'    => 'TCH',
            'nome'      => 'Trincheira',
        ]);

        PublicPlace::create([
            'codigo'    => 'TER',
            'nome'      => 'Terminal',
        ]);

        PublicPlace::create([
            'codigo'    => 'TR',
            'nome'      => 'Trecho',
        ]);

        PublicPlace::create([
            'codigo'    => 'TRV',
            'nome'      => 'Trevo',
        ]);

        PublicPlace::create([
            'codigo'    => 'TUN',
            'nome'      => 'Túnel',
        ]);

        PublicPlace::create([
            'codigo'    => 'TV',
            'nome'      => 'Travessa',
        ]);

        PublicPlace::create([
            'codigo'    => 'TVP',
            'nome'      => 'Travessa Particular',
        ]);

        PublicPlace::create([
            'codigo'    => 'TVV',
            'nome'      => 'Travessa Velha',
        ]);

        PublicPlace::create([
            'codigo'    => 'UNI',
            'nome'      => 'Unidade',
        ]);

        PublicPlace::create([
            'codigo'    => 'V',
            'nome'      => 'Via',
        ]);

        PublicPlace::create([
            'codigo'    => 'V C',
            'nome'      => 'Via Coletora',
        ]);

        PublicPlace::create([
            'codigo'    => 'V L',
            'nome'      => 'Via Local',
        ]);

        PublicPlace::create([
            'codigo'    => 'VAC',
            'nome'      => 'Via de Acesso',
        ]);

        PublicPlace::create([
            'codigo'    => 'VAL',
            'nome'      => 'Vala',
        ]);

        PublicPlace::create([
            'codigo'    => 'VCO',
            'nome'      => 'Via Costeira',
        ]);

        PublicPlace::create([
            'codigo'    => 'VD',
            'nome'      => 'Viaduto',
        ]);

        PublicPlace::create([
            'codigo'    => 'V-E',
            'nome'      => 'Via Expressa',
        ]);

        PublicPlace::create([
            'codigo'    => 'VER',
            'nome'      => 'Vereda',
        ]);

        PublicPlace::create([
            'codigo'    => 'VEV',
            'nome'      => 'Via Elevado',
        ]);

        PublicPlace::create([
            'codigo'    => 'VL',
            'nome'      => 'Vila',
        ]);

        PublicPlace::create([
            'codigo'    => 'VLA',
            'nome'      => 'Viela',
        ]);

        PublicPlace::create([
            'codigo'    => 'VLE',
            'nome'      => 'Vale',
        ]);

        PublicPlace::create([
            'codigo'    => 'VLT',
            'nome'      => 'Via Litorânea',
        ]);

        PublicPlace::create([
            'codigo'    => 'VPE',
            'nome'      => 'Via de Pedestre',
        ]);

        PublicPlace::create([
            'codigo'    => 'VRT',
            'nome'      => 'Variante',
        ]);

        PublicPlace::create([
            'codigo'    => 'ZIG',
            'nome'      => 'Zigue-Zague',
        ]);
    }

    public function runPermissionAndRolesSeeder()
    {
        $roleRecadastrador = Role::create(['name' => 'Recadastrador']);
        $roleResponsavelLegal = Role::create(['name' => 'Responsável Legal']);
        $roleAdmin = Role::create(['name' => 'Admin']);

        $permissionParcial = Permission::create(['name' => 'salvar parcial']);
        $permissionFinalizar = Permission::create(['name' => 'finalizar']);
        $permissionAdmin = Permission::create(['name' => 'admin']);

        $roleRecadastrador->givePermissionTo($permissionParcial);

        $roleResponsavelLegal->givePermissionTo($permissionFinalizar);

        $roleAdmin->givePermissionTo($permissionParcial);
        $roleAdmin->givePermissionTo($permissionFinalizar);
        $roleAdmin->givePermissionTo($permissionAdmin);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        
        $user->assignRole('Admin');

        $amanda = User::create([
            'name' => 'Amanda Michelman',
            'email' => 'contato@norbell.com.br',
            'password' => bcrypt('amanda123'),
        ]);

        $amanda->assignRole('Recadastrador');

        $willian = User::create([
            'name' => 'Willian Godoy',
            'email' => 'willian@publicaas.com.br',
            'password' => bcrypt('willian123'),
        ]);

        $willian->assignRole('Recadastrador');

        $marcelo = User::create([
            'name' => 'Marcelo Braga',
            'email' => 'marcelo@publicaas.com.br',
            'password' => bcrypt('marcelo123'),
        ]);

        $marcelo->assignRole('Recadastrador');

        $natan = User::create([
            'name' => 'Natanael Buzinari',
            'email' => 'natan@publicaas.com.br',
            'password' => bcrypt('natan123'),
        ]);

        $natan->assignRole('Responsável Legal');

        $diogo = User::create([
            'name' => 'Diogo Norbeato',
            'email' => 'diogo@publicaas.com.br',
            'password' => bcrypt('diogo123'),
        ]);

        $natan->assignRole('Recadastrador');

    }

}
