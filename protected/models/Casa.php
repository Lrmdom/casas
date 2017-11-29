<?php

/**
 * This is the model class for table "casa".
 *
 * The followings are the available columns in table 'casa':
 * @property integer $cod_casa
 * @property string $adicionado
 * @property string $data_activo
 * @property string $destino
 * @property string $proprietario
 * @property integer $propid
 * @property string $designacao
 * @property string $tipoalojamento
 * @property string $tipo
 * @property string $pessoas
 * @property string $pais
 * @property string $distrito
 * @property string $concelho
 * @property string $endereco
 * @property string $codpostal
 * @property string $area
 * @property string $lat
 * @property string $lng
 * @property string $altitude
 * @property string $localidade
 * @property string $dist_centro
 * @property string $dist_praia
 * @property boolean $piscina
 * @property boolean $televisao
 * @property boolean $ar_condicionado
 * @property string $img_1
 * @property string $alt_img_1
 * @property string $img_2
 * @property string $img_3
 * @property string $img_4
 * @property string $img_5
 * @property string $img_6
 * @property string $img_7
 * @property string $img_8
 * @property integer $quartos
 * @property integer $camascasal
 * @property integer $camassingle
 * @property integer $casasbanho
 * @property boolean $golf
 * @property boolean $tenis
 * @property boolean $pesca
 * @property boolean $natacao
 * @property boolean $bowling
 * @property boolean $casino
 * @property boolean $cinema
 * @property boolean $discoteca
 * @property string $outras_actividprox
 * @property boolean $roupascama
 * @property boolean $roupasbanho
 * @property boolean $limpeza
 * @property boolean $utilcozinha
 * @property boolean $fogao
 * @property boolean $frigorif
 * @property boolean $congel
 * @property boolean $forno
 * @property boolean $barbecue
 * @property boolean $microndas
 * @property boolean $mlavaloica
 * @property boolean $mlavaroupa
 * @property boolean $aqcentral
 * @property boolean $satcabo
 * @property boolean $internet
 * @property boolean $outros_servicos
 * @property string $link_info
 * @property string $link_dispon
 * @property boolean $activo
 * @property string $sessid
 * @property boolean $promo
 * @property boolean $certif
 * @property string $data_act
 * @property string $titulo
 * @property integer $qtspecialoffer
 * @property boolean $fengomar
 * @property boolean $estacionamento
 * @property boolean $telefone
 * @property boolean $despertador
 * @property boolean $dvd
 * @property boolean $torradeira
 * @property boolean $animais
 * @property boolean $fumadores
 * @property boolean $caucao
 * @property string $valorcaucao
 * @property boolean $deficientes
 * @property $img_7;
 * @property $img_8;
 * @property $img_9;
 * @property $img_10;
 * The followings are the available model relations:
 * @property Feedback[] $feedbacks
 * @property Prereserva[] $prereservas
 * @property Preco[] $precos
 * @property $for_rent
 * @property $for_sale
 * @property $for_arrenda
 * @property $valor_arrendamento
 * @property $valor_venda
 *
 */
class Casa extends CActiveRecord {

    public $chkgroup;
    public $datefree;
    public $inicio;
    public $fim;
    public $certif_energ;
    public $certif_energ_level;
    public $seo_title;
    public $seo_title_en;
    public $seo_title_de;
    public $seo_title_es;
    public $seo_title_fr;
    public $ano;
    public $priceByDate;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Casa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'casa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('pessoas', 'default', 'value' => ''),
            array('for_rent,for_sale,for_arrenda', 'validateCheckboxs', 'message' => 'Pelo menos um tipo de negócio tem que estar selecionado'),
            array('valor_arrendamento,valorcaucao', 'validateValor'),
            array('valorcaucao,pessoas,altitude,dist_centro, dist_praia', 'validateValor2'),
            array('valor_venda,valorcaucao', 'validateValorVenda'),
            array(' lat, lng', 'required', 'message' => 'Por favor use o mapa para inserir coordenadas.'),
            //array('seo_title', 'required', 'on' => 'nada'),
            array('designacao,destino,tipoalojamento, tipo, pessoas, pais, localidade,valorcaucao,seo_title', 'required', 'on' => 'notCertif'),
            array('designacao,destino,tipoalojamento, tipo, pais, distrito, concelho, endereco,area,  localidade,quartos, camascasal, camassingle, casasbanho,titulo,seo_title,seo_title_en,seo_title_de,seo_title_es,seo_title_fr,ano,propid', 'required', 'on' => 'admin'),
            array('propid,quartos, camascasal, camassingle, casasbanho, qtspecialoffer', 'numerical', 'integerOnly' => true),
            array('data_activo, destino, proprietario, designacao, tipoalojamento, tipo, pessoas, pais, distrito, concelho, codpostal, area, lat, lng, altitude, localidade, dist_centro, dist_praia, link_info, link_dispon, sessid, data_act, valorcaucao,for_rent,for_sale,certif_energ,certif_energ_level', 'length', 'max' => 50),
            array('endereco', 'length', 'max' => 200),
            array('seo_title,seo_title_en,seo_title_de,seo_title_es,seo_title_fr', 'length', 'max' => 100),
            array('img_1, alt_img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8', 'length', 'max' => 300),
            array('outras_actividprox', 'length', 'max' => 600),
            array('titulo', 'length', 'max' => 600),
            array('adicionado,tipoalojamento, piscina, televisao, ar_condicionado, golf, tenis, pesca, natacao, bowling, casino, cinema, discoteca, roupascama, roupasbanho, limpeza, utilcozinha, fogao, frigorif, congel, forno, barbecue, microndas, mlavaloica, mlavaroupa, aqcentral, satcabo, internet, outros_servicos, activo, promo, certif, fengomar, estacionamento, telefone, despertador, dvd, torradeira, animais, fumadores, caucao, deficientes,for_rent,for_sale,for_arrenda,valor_arrendamento,valor_venda,cod_casa,certif_energ,seo_title,seo_title_en,seo_title_de,seo_title_es,seo_title_fr', 'safe'),
            // The following rule is used by search().
// Please remove those attributes that should not be searched.
            array('cod_casa, adicionado, data_activo, destino, proprietario,propid, designacao, tipoalojamento, tipo, pessoas, pais, distrito, concelho, endereco, codpostal, area, lat, lng, altitude, localidade, dist_centro, dist_praia, piscina, televisao, ar_condicionado,  alt_img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8, quartos, camascasal, camassingle, casasbanho, golf, tenis, pesca, natacao, bowling, casino, cinema, discoteca, outras_actividprox, roupascama, roupasbanho, limpeza, utilcozinha, fogao, frigorif, congel, forno, barbecue, microndas, mlavaloica, mlavaroupa, aqcentral, satcabo, internet, outros_servicos, link_info, link_dispon, activo, sessid, promo, certif, data_act, titulo, qtspecialoffer, fengomar, estacionamento, telefone, despertador, dvd, torradeira, animais, fumadores, caucao, valorcaucao, deficientes,for_rent,for_sale,for_arrenda,valor_arrendamento,valor_venda,certif_energ,seo_title,seo_title_en,seo_title_de,seo_title_es,seo_title_fr', 'safe', 'on' => 'search'),
        );
    }

    function getIdTitle() {
        return $this->cod_casa . ' - ' . $this->seo_title;
    }

    public function Curl($url, $is_coockie_set = false) {

        if (!$is_coockie_set) {
            /* STEP 1. let’s create a cookie file */
            $ckfile = tempnam("/tmp", "CURLCOOKIE");

            /* STEP 2. visit the homepage to set the cookie properly */
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
        }



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        return $output;
    }

    public function translate($word, $conversion) {
        $word = urlencode($word);


        $url = 'http://translate.google.com/translate_a/t?client=t&text=' . $word . '&hl=en&sl=pt&tl=' . $conversion . '&multires=1&otf=2&pc=1&ssel=0&tsel=0&sc=1';

        $name_en = $this->curl($url);

        $name_en = substr($name_en, 1, strpos($name_en, ']]') + 1);
        $name_en = json_decode($name_en);

        $sentences = '';
        if ($name_en) {
            foreach ($name_en as $n)
                $sentences .=' ' . $n[0];
        }
        return $sentences;
    }

    public function dashboardAlerts() {

        $fdkcount = Feedback::model()->revised();
        $preReservasCount = count(Reserva::model()->searchPrereservas()->getData());
        $casas = $this->inactive();
        $nofdk = Reserva::model()->searchFeedback()->getdata();
        $alerts = $fdkcount + $preReservasCount + $casas + count($nofdk);
        return $alerts;
    }

    public function getStatus($rent, $sale, $arrenda) {
        if ($rent == 1)
            echo "Férias <br>";
        if ($sale == 1)
            echo "Venda <br>";
        if ($arrenda == 1)
            echo "Arrenda <br>";
    }

    public function validateCheckboxs($attribute, $params) {
        if (!$this->for_arrenda && !$this->for_rent && !$this->for_sale) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateValor($attribute, $params) {
        if ($this->for_arrenda) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateValor2($attribute, $params) {
        if ($this->for_rent) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateValorVenda($attribute, $params) {
        if ($this->for_sale) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function inactive() {
        return count($this->with('casasprop')->findAll('casasprop.propid=' . Yii::app()->user->id . ' and t.activo=0 or t.activo=null'));
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'casas' => array(self::BELONGS_TO, 'Proprietario', 'propid'),
            'feedbacks' => array(self::HAS_MANY, 'Feedback', 'cod_casa'),
            'reservas' => array(self::HAS_MANY, 'Reserva', 'cod_casa'),
            'precos' => array(self::HAS_MANY, 'Preco', 'cod_casa'),
            'wislist' => array(self::HAS_MANY, 'Mylist', 'cod_casa'),
            'casasprop' => array(Casa::BELONGS_TO, 'Proprietario', 'propid')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'cod_casa' => Yii::t('models', 'Casa'),
            'adicionado' => Yii::t('models', 'Adicionado'),
            'data_activo' => Yii::t('models', 'Activaçao'),
            'destino' => Yii::t('models', 'Destino'),
            'proprietario' => Yii::t('models', 'Proprietario'),
            'propid' => 'Propid',
            'designacao' => Yii::t('models', 'Designação'),
            'tipoalojamento' => Yii::t('models', 'Tipo alojamento'),
            'tipo' => Yii::t('models', 'Tipo'),
            'pessoas' => Yii::t('models', 'Pessoas'),
            'pais' => Yii::t('models', 'Pais'),
            'distrito' => Yii::t('models', 'Distrito'),
            'concelho' => Yii::t('models', 'Concelho'),
            'endereco' => Yii::t('models', 'Endereco'),
            'codpostal' => Yii::t('models', 'Codigo postal'),
            'area' => Yii::t('models', 'Area m2'),
            'lat' => 'Lat',
            'lng' => 'Lng',
            'altitude' => Yii::t('models', 'Altitude'),
            'localidade' => Yii::t('models', 'Localidade'),
            'dist_centro' => Yii::t('models', 'Dist. Centro'),
            'dist_praia' => Yii::t('models', 'Dist. Praia'),
            'piscina' => Yii::t('models', 'Piscina'),
            'televisao' => Yii::t('models', 'Televisão'),
            'ar_condicionado' => Yii::t('models', 'Ar Condicionado'),
            'img_1' => 'Img 1',
            'alt_img_1' => 'Alt Img 1',
            'img_2' => 'Img 2',
            'img_3' => 'Img 3',
            'img_4' => 'Img 4',
            'img_5' => 'Img 5',
            'img_6' => 'Img 6',
            'img_7' => 'Img 7',
            'img_8' => 'Img 8',
            'quartos' => Yii::t('models', 'Quartos'),
            'camascasal' => Yii::t('models', 'Camas casal'),
            'camassingle' => Yii::t('models', 'Camas single'),
            'casasbanho' => Yii::t('models', 'Casas banho'),
            'golf' => 'Golf',
            'tenis' => 'Tenis',
            'pesca' => Yii::t('models', 'Pesca'),
            'natacao' => Yii::t('models', 'Natacao'),
            'bowling' => Yii::t('models', 'Bowling'),
            'casino' => 'Casino',
            'cinema' => 'Cinema',
            'discoteca' => Yii::t('models', 'Discoteca'),
            'outras_actividprox' => Yii::t('models', 'Outras Actividades'),
            'roupascama' => Yii::t('models', 'Roupas cama'),
            'roupasbanho' => Yii::t('models', 'Roupas banho'),
            'limpeza' => Yii::t('models', 'Limpeza'),
            'utilcozinha' => Yii::t('models', 'Utensílios cozinha'),
            'fogao' => Yii::t('models', 'Fogão'),
            'frigorif' => Yii::t('models', 'Frigorifico'),
            'congel' => Yii::t('models', 'Congelador'),
            'forno' => Yii::t('models', 'Forno'),
            'barbecue' => Yii::t('models', 'Barbecue'),
            'microndas' => Yii::t('models', 'Micro ondas'),
            'mlavaloica' => Yii::t('models', 'Máquina lava loiça'),
            'mlavaroupa' => Yii::t('models', 'Máquina lava roupa'),
            'aqcentral' => Yii::t('models', 'Aquecimento central'),
            'satcabo' => Yii::t('models', 'Satélite/cabo'),
            'internet' => 'Internet',
            'outros_servicos' => Yii::t('models', 'Outros Serviços'),
            'link_info' => 'Link Info',
            'link_dispon' => 'Link Dispon',
            'activo' => Yii::t('models', 'Activo'),
            'sessid' => 'Sessid',
            'promo' => Yii::t('models', 'Promoção'),
            'certif' => Yii::t('models', 'Certificada'),
            'data_act' => Yii::t('models', 'Data Actualização'),
            'titulo' => Yii::t('models', 'Titulo'),
            'qtspecialoffer' => 'Qtspecialoffer',
            'fengomar' => Yii::t('models', 'Ferro engomar'),
            'estacionamento' => Yii::t('models', 'Estacionamento'),
            'telefone' => Yii::t('models', 'Telefone'),
            'despertador' => Yii::t('models', 'Despertador'),
            'dvd' => 'Dvd',
            'torradeira' => Yii::t('models', 'Torradeira'),
            'animais' => Yii::t('models', 'Animais'),
            'fumadores' => Yii::t('models', 'Fumadores'),
            'caucao' => Yii::t('models', 'Caução'),
            'valorcaucao' => Yii::t('models', 'Valor caução'),
            'deficientes' => Yii::t('models', 'Acesso Deficientes'),
            'for_rent' => Yii::t('models', 'Férias'),
            'for_sale' => Yii::t('models', 'Venda'),
            'for_arrenda' => Yii::t('models', 'Arrendamento')
        );
    }

    public function createSlug($title) {
        // convert the raw title into an url friendly format here
        return $title;
    }

    public function storeTranslation($model) {


        $smessag = new SourceMessage();
        $lastid = $smessag->find('message="' . $model->seo_title . '"');
        $messag = new Message();
        $messag->id = $lastid->id;

        if ($model->seo_title_en) {
            $messag = new Message();
            $messag->id = $lastid->id;
            $messag->language = 'en';
            $messag->translation = $model->seo_title_en;

            $messag->save();
        }
        if ($model->seo_title_de) {
            $messag = new Message();
            $messag->id = $lastid->id;
            $messag->language = 'de';
            $messag->translation = $model->seo_title_de;
            $messag->save();
        }
        if ($model->seo_title_es) {
            $messag = new Message();
            $messag->id = $lastid->id;
            $messag->language = 'es';
            $messag->translation = $model->seo_title_es;
            $messag->save();
        }
        if ($model->seo_title_fr) {
            $messag = new Message();
            $messag->id = $lastid->id;
            $messag->language = 'fr';
            $messag->translation = $model->seo_title_fr;
            $messag->save();
        }
        $trans = $lastid->with('messages');
        return $trans;
    }

    public function storeTranslationUpdate($model, $smessag) {


        if (!$smessag->with('messages')->find('message="' . $model->seo_title . '" and messages.language="en"')) {
            $messag = new Message();

            $messag->id = $smessag->id;
            $messag->language = 'en';
            $messag->translation = $model->seo_title_en;

            $messag->save();
        } else {
            $messag = new Message();
            $messag->isNewRecord = FALSE;
            $messag->id = $smessag->id;
            $messag->language = 'en';
            $messag->translation = $model->seo_title_en;

            $messag->save();
        }
        if (!$smessag->with('messages')->find('message="' . $model->seo_title . '" and messages.language="de"')) {
            $messag = new Message();
            $messag->id = $smessag->id;
            $messag->language = 'de';
            $messag->translation = $model->seo_title_de;

            $messag->save();
        } else {
            $messag = new Message();
            $messag->isNewRecord = FALSE;
            $messag->id = $smessag->id;
            $messag->language = 'de';
            $messag->translation = $model->seo_title_de;

            $messag->save();
        }
        if (!$smessag->with('messages')->find('message="' . $model->seo_title . '" and messages.language="es"')) {
            $messag = new Message();
            $messag->id = $smessag->id;
            $messag->language = 'es';
            $messag->translation = $model->seo_title_es;

            $messag->save();
        } else {
            $messag = new Message();
            $messag->isNewRecord = FALSE;
            $messag->id = $smessag->id;
            $messag->language = 'es';
            $messag->translation = $model->seo_title_es;

            $messag->save();
        }
        if (!$smessag->with('messages')->find('message="' . $model->seo_title . '" and messages.language="fr"')) {
            $messag = new Message();
            $messag->id = $smessag->id;
            $messag->language = 'fr';
            $messag->translation = $model->seo_title_fr;

            $messag->save();
        } else {
            $messag = new Message();
            $messag->isNewRecord = FALSE;
            $messag->id = $smessag->id;
            $messag->language = 'fr';
            $messag->translation = $model->seo_title_fr;

            $messag->save();
        }
        $trans = $smessag->with('messages')->find('t.id=' . $smessag->id);

        return $trans;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->compare('adicionado', $this->adicionado, true);
        $criteria->compare('data_activo', $this->data_activo, true);
        $criteria->compare('destino', $this->destino, true);
        $criteria->compare('t.proprietario', $this->proprietario, true);
        $criteria->compare('t.propid', $this->propid);
        $criteria->compare('designacao', $this->designacao, true);
        $criteria->compare('tipoalojamento', $this->tipoalojamento, true);
        $criteria->compare('tipo', $this->tipo);
        $criteria->compare('pessoas', $this->pessoas);
        $criteria->compare('pais', $this->pais, true);
        $criteria->compare('distrito', $this->distrito, true);
        $criteria->compare('concelho', $this->concelho, true);
        $criteria->compare('endereco', $this->endereco, true);
        $criteria->compare('codpostal', $this->codpostal, true);
        $criteria->compare('area', $this->area, true);
        $criteria->compare('lat', $this->lat, true);
        $criteria->compare('lng', $this->lng, true);
        $criteria->compare('altitude', $this->altitude, true);
        $criteria->compare('t.localidade', $this->localidade, true);
        $criteria->compare('dist_centro', $this->dist_centro, true);
        $criteria->compare('dist_praia', $this->dist_praia, true);
        $criteria->compare('piscina', $this->piscina);
        $criteria->compare('televisao', $this->televisao);
        $criteria->compare('ar_condicionado', $this->ar_condicionado);
        $criteria->compare('img_1', $this->img_1, true);
        $criteria->compare('alt_img_1', $this->alt_img_1, true);

        $criteria->compare('quartos', $this->quartos);
        $criteria->compare('camascasal', $this->camascasal);
        $criteria->compare('camassingle', $this->camassingle);
        $criteria->compare('casasbanho', $this->casasbanho);
        $criteria->compare('golf', $this->golf);
        $criteria->compare('tenis', $this->tenis);
        $criteria->compare('pesca', $this->pesca);
        $criteria->compare('natacao', $this->natacao);
        $criteria->compare('bowling', $this->bowling);
        $criteria->compare('casino', $this->casino);
        $criteria->compare('cinema', $this->cinema);
        $criteria->compare('discoteca', $this->discoteca);
        $criteria->compare('outras_actividprox', $this->outras_actividprox, true);
        $criteria->compare('roupascama', $this->roupascama);
        $criteria->compare('roupasbanho', $this->roupasbanho);
        $criteria->compare('limpeza', $this->limpeza);
        $criteria->compare('utilcozinha', $this->utilcozinha);
        $criteria->compare('fogao', $this->fogao);
        $criteria->compare('frigorif', $this->frigorif);
        $criteria->compare('congel', $this->congel);
        $criteria->compare('forno', $this->forno);
        $criteria->compare('barbecue', $this->barbecue);
        $criteria->compare('microndas', $this->microndas);
        $criteria->compare('mlavaloica', $this->mlavaloica);
        $criteria->compare('mlavaroupa', $this->mlavaroupa);
        $criteria->compare('aqcentral', $this->aqcentral);
        $criteria->compare('satcabo', $this->satcabo);
        $criteria->compare('internet', $this->internet);
        $criteria->compare('outros_servicos', $this->outros_servicos);
        $criteria->compare('link_info', $this->link_info, true);
        $criteria->compare('link_dispon', $this->link_dispon, true);
        $criteria->compare('sessid', $this->sessid, true);
        $criteria->compare('promo', $this->promo);
        $criteria->compare('certif', $this->certif);
        $criteria->compare('data_act', $this->data_act, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('qtspecialoffer', $this->qtspecialoffer);
        $criteria->compare('fengomar', $this->fengomar);
        $criteria->compare('estacionamento', $this->estacionamento);
        $criteria->compare('telefone', $this->telefone);
        $criteria->compare('despertador', $this->despertador);
        $criteria->compare('dvd', $this->dvd);
        $criteria->compare('torradeira', $this->torradeira);
        $criteria->compare('animais', $this->animais);
        $criteria->compare('fumadores', $this->fumadores);
        $criteria->compare('caucao', $this->caucao);
        $criteria->compare('valorcaucao', $this->valorcaucao, true);
        $criteria->compare('deficientes', $this->deficientes);
        $criteria->compare('for_rent', $this->for_rent);
        $criteria->compare('for_sale', $this->for_sale);
        $criteria->compare('for_arrenda', $this->for_arrenda);
        $criteria->compare('t.activo', $this->activo);

        //$criteria->with = array('casas', 'precos');
        $criteria->with = array('casas', "casasprop");
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        //$criteria->compare('casas.propid', Yii::app()->user->id);
        $criteria->compare('casas.propid', $uid);
        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        return $test;
    }

    public function dateFree($model) {
        $now = new CDbExpression("CURDATE()");

        $myproc2 = "Select preco.id as idpreco, inicio, fim, cod_casa, reserva.id from preco left join reserva on preco.id = reserva.idpreco where cod_casa = " . $model->cod_casa . " AND livre = 0 and fim > " . $now . " and (reserva_state = " . Reserva::RESERVA . " OR reserva_state = " . Reserva::SINAL . ") order by idpreco desc";
        $ocupas = Yii::app()->db->createCommand($myproc2)->query()->readAll();
        foreach ($ocupas as $ocupa) {
            $starte = $ocupa['inicio'];
            $dtEnde = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($starte)));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($dtEnde)));
            $precoid = $ocupa['idpreco'];
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                $inic = date('Y/m/j', strtotime($model->precos->inicio));
                $fim = date('Y/m/j', strtotime($model->precos->fim));
                While (strtotime($inic) <= strtotime($fim)) {
                    if ($inic == $dtLoop && ($state == self::SINAL || $state == self::RESERVA)) {
                        Yii::app()->user->setFlash('error', $inic . ' Este dia ja esta reservado ! Reserva ' . $ocupa['id'], true);
                        return 0;
                    }
                    $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        return 1;
    }

    public function isearch() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('t.cod_casa', $this->cod_casa);
        $criteria->compare('adicionado', $this->adicionado, true);
        $criteria->compare('data_activo', $this->data_activo, true);
        $criteria->compare('destino', $this->destino, true, 'and');
        $criteria->compare('proprietario', $this->proprietario, true);
        $criteria->compare('propid', $this->propid, true);
        $criteria->compare('designacao', $this->designacao, true);
        $criteria->compare('tipoalojamento', $this->tipoalojamento, true, 'and');
        $criteria->compare('tipo', $this->tipo, 'and');
        $criteria->compare('pessoas', $this->pessoas);

        $criteria->compare('pais', $this->pais, true);
        $criteria->compare('distrito', $this->distrito, true);
        $criteria->compare('concelho', $this->concelho, true);
        $criteria->compare('endereco', $this->endereco, true);
        $criteria->compare('codpostal', $this->codpostal, true);
        $criteria->compare('area', $this->area, true);
        $criteria->compare('lat', $this->lat, true);
        $criteria->compare('lng', $this->lng, true);
        $criteria->compare('altitude', $this->altitude, true);
        $criteria->compare('t.localidade', $this->localidade, true, 'and');
        $criteria->compare('dist_centro', $this->dist_centro, true);
        $criteria->compare('dist_praia', $this->dist_praia, true);
        $criteria->compare('piscina', $this->piscina);
        $criteria->compare('televisao', $this->televisao);
        $criteria->compare('ar_condicionado', $this->ar_condicionado);
        $criteria->compare('img_1', $this->img_1, true);
        $criteria->compare('alt_img_1', $this->alt_img_1, true);

        $criteria->compare('quartos', $this->quartos);
        $criteria->compare('camascasal', $this->camascasal);
        $criteria->compare('camassingle', $this->camassingle);
        $criteria->compare('casasbanho', $this->casasbanho);
        $criteria->compare('golf', $this->golf);
        $criteria->compare('tenis', $this->tenis);
        $criteria->compare('pesca', $this->pesca);
        $criteria->compare('natacao', $this->natacao);
        $criteria->compare('bowling', $this->bowling);
        $criteria->compare('casino', $this->casino);
        $criteria->compare('cinema', $this->cinema);
        $criteria->compare('discoteca', $this->discoteca);
        $criteria->compare('outras_actividprox', $this->outras_actividprox, true);
        $criteria->compare('roupascama', $this->roupascama);
        $criteria->compare('roupasbanho', $this->roupasbanho);
        $criteria->compare('limpeza', $this->limpeza);
        $criteria->compare('utilcozinha', $this->utilcozinha);
        $criteria->compare('fogao', $this->fogao);
        $criteria->compare('frigorif', $this->frigorif);
        $criteria->compare('congel', $this->congel);
        $criteria->compare('forno', $this->forno);
        $criteria->compare('barbecue', $this->barbecue);
        $criteria->compare('microndas', $this->microndas);
        $criteria->compare('mlavaloica', $this->mlavaloica);
        $criteria->compare('mlavaroupa', $this->mlavaroupa);
        $criteria->compare('aqcentral', $this->aqcentral);
        $criteria->compare('satcabo', $this->satcabo);
        $criteria->compare('internet', $this->internet);
        $criteria->compare('outros_servicos', $this->outros_servicos);
        $criteria->compare('link_info', $this->link_info, true);
        $criteria->compare('link_dispon', $this->link_dispon, true);
        $criteria->compare('t.activo', '1');
        $criteria->compare('sessid', $this->sessid, true);
        $criteria->compare('promo', $this->promo);
        $criteria->compare('certif', $this->certif);
        $criteria->compare('data_act', $this->data_act, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('qtspecialoffer', $this->qtspecialoffer);
        $criteria->compare('fengomar', $this->fengomar);
        $criteria->compare('estacionamento', $this->estacionamento);
        $criteria->compare('telefone', $this->telefone);
        $criteria->compare('despertador', $this->despertador);
        $criteria->compare('dvd', $this->dvd);
        $criteria->compare('torradeira', $this->torradeira);
        $criteria->compare('animais', $this->animais);
        $criteria->compare('fumadores', $this->fumadores);
        $criteria->compare('caucao', $this->caucao);
        $criteria->compare('valorcaucao', $this->valorcaucao, true);
        $criteria->compare('deficientes', $this->deficientes);
        $criteria->compare('for_rent', $this->for_rent);
        $criteria->compare('for_sale', $this->for_sale);
        $criteria->compare('for_arrenda', $this->for_arrenda);
        //$criteria->compare('datefree', $this->dateFree($this->cod_casa));
        $criteria->with = array('casas', 'feedbacks', 'precos');
        $criteria->order = ' certif DESC';
        //$criteria->addCondition('pessoas >=' . $this->pessoas);
        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        return $test;
    }

    public function isearchMapMap() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('t.cod_casa', $this->cod_casa);
        $criteria->compare('destino', $this->destino, true);
        $criteria->compare('tipoalojamento', $this->tipoalojamento, true);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('pessoas', ' >= ' . $this->pessoas, true);
        $criteria->compare('t.localidade', $this->localidade, true);
        $criteria->compare('t.concelho', $this->concelho, true);
        $criteria->compare('t.pais', $this->pais, true);
        $criteria->compare('piscina', $this->piscina);
        $criteria->compare('quartos', ' >= ' . $this->quartos, true);
        $criteria->compare('camascasal', ' >= ' . $this->camascasal, true);
        $criteria->compare('camassingle', ' >= ' . $this->camassingle, true);
        $criteria->compare('casasbanho', ' >= ' . $this->casasbanho, true);
        $criteria->compare('ar_condicionado', $this->ar_condicionado, true);
        $criteria->compare('certif', $this->certif);
        $criteria->compare('satcabo', $this->satcabo);
        $criteria->compare('internet', $this->internet);
        $criteria->compare('for_rent', $this->for_rent);
        $criteria->compare('for_arrenda', $this->for_arrenda);
        $criteria->compare('for_sale', $this->for_sale);
        //$criteria->compare('certif', 1);
        $criteria->compare('t.activo', 1);


        //$criteria->compare('datefree', $this->dateFree($this->cod_casa));


        $criteria->with = array('casas', 'feedbacks', 'precos', 'wislist');

        $criteria->order = ' certif DESC';

        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 2000,
            ),
        ));
        return $test;
    }

    public function isearchMap() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('t.cod_casa', $this->cod_casa);
        $criteria->compare('destino', $this->destino, true);
        $criteria->compare('tipoalojamento', $this->tipoalojamento, true);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('pessoas', ' >= ' . $this->pessoas, true);
        $criteria->compare('t.localidade', $this->localidade, true);
        $criteria->compare('t.concelho', $this->concelho, true);
        $criteria->compare('t.pais', $this->pais, true);
        $criteria->compare('piscina', $this->piscina);
        $criteria->compare('quartos', ' >= ' . $this->quartos, true);
        $criteria->compare('camascasal', ' >= ' . $this->camascasal, true);
        $criteria->compare('camassingle', ' >= ' . $this->camassingle, true);
        $criteria->compare('casasbanho', ' >= ' . $this->casasbanho, true);
        $criteria->compare('ar_condicionado', $this->ar_condicionado, true);
        $criteria->compare('certif', $this->certif);
        $criteria->compare('satcabo', $this->satcabo);
        $criteria->compare('internet', $this->internet);
        $criteria->compare('for_rent', $this->for_rent);
        $criteria->compare('for_arrenda', $this->for_arrenda);
        $criteria->compare('for_sale', $this->for_sale);
        //$criteria->compare('certif', 1);
        $criteria->compare('t.activo', 1);


        //$criteria->compare('datefree', $this->dateFree($this->cod_casa));


        $criteria->with = array('casas', 'feedbacks', 'precos', 'wislist');

        $criteria->order = ' certif DESC';


        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));


        return $test;
    }

    public function filterByDate($data, $inicio, $fim) {
        $reserva = new Reserva;
        foreach ($data AS $rowIndex => $value) {
            if ($reserva->checkDaysRaw($value->cod_casa, $inicio, $fim) === FALSE) {
                $data[$rowIndex]['priceByDate'] = Reserva::model()->calculatePrice($value->cod_casa, $inicio, $fim);
            } else {
                unset($data[$rowIndex]);
            }
        }
        return $data;
    }

}
