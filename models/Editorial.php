<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "editorial".
 *
 * @property string $id_editorial
 * @property string|null $nombre
 *
 * @property Libros[] $libros
 */
class Editorial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'editorial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_editorial'], 'required'],
            [['id_editorial'], 'string', 'max' => 11],
            [['nombre'], 'string', 'max' => 50],
            [['id_editorial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_editorial' => 'Id Editorial',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['id_editorial_fk' => 'id_editorial']);
    }
}
