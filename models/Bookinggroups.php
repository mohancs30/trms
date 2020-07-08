<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookinggroups".
 *
 * @property integer $id
 * @property integer $groups
 * @property string $movetype
 * @property string $vehicletype
 * @property string $size
 * @property string $type
 * @property integer $req_qty
 * @property integer $avl_qty
 * @property string $bref_no
 * @property string $Arrival_date
 * @property string $From_date
 * @property string $To_date
 * @property string $remarks
 * @property string $status
 * @property string $c_by
 * @property string $c_date
 * @property string $m_by
 * @property string $m_date
 */
class Bookinggroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookinggroups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movetype','vehicletype', 'size', 'type','Arrival_date', 'From_date', 'To_date','c_by', 'c_date'], 'required'],
            [['id','req_qty', 'avl_qty'], 'integer'],
            [['Arrival_date', 'From_date', 'To_date', 'c_date', 'm_date'], 'safe'],
            [['movetype', 'vehicletype', 'size', 'type', 'status', 'c_by', 'm_by'], 'string', 'max' => 40],
            [['bref_no', 'remarks'], 'string', 'max' => 20],
        ];
    }


  public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];
		
		
        if (!empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels,'B_id', 'B_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['B_id']) && !empty($item['B_id']) && isset($multipleModels[$item['B_id']])) {
                    $models[] = $multipleModels[$item['B_id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groups' => 'Groups',
            'movetype' => 'Movetype',
            'vehicletype' => 'Vehicletype',
            'size' => 'Size',
            'type' => 'Type',
            'req_qty' => 'Req Qty',
            'avl_qty' => 'Avl Qty',
            'bref_no' => 'Bref No',
            'Arrival_date' => 'Arrival Date',
            'From_date' => 'From Date',
            'To_date' => 'To Date',
            'remarks' => 'Remarks',
            'status' => 'Status',
            'c_by' => 'C By',
            'c_date' => 'C Date',
            'm_by' => 'M By',
            'm_date' => 'M Date',
        ];
    }
	
		

	
}
