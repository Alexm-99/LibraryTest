<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property string $id_genero
 * @property string|null $genero
 * @property string $id_libro
 *
 * @property Libros $libro
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_genero', 'id_libro'], 'required'],
            [['id_genero', 'id_libro'], 'string', 'max' => 11],
            [['genero'], 'string', 'max' => 100],
            [['id_genero'], 'unique'],
            [['id_libro'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['id_libro' => 'id_libro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_genero' => 'Id Genero',
            'genero' => 'Genero',
            'id_libro' => 'Id Libro',
        ];
    }

    /**
     * Gets query for [[Libro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLibro()
    {
        return $this->hasOne(Libros::class, ['id_libro' => 'id_libro']);
    }
}
