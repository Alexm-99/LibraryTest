<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property string $id_libro
 * @property string|null $nombre
 * @property string|null $detalle
 * @property string|null $id_editorial_fk
 *
 * @property Autor[] $autors
 * @property Editorial $editorialFk
 * @property Genero[] $generos
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_libro'], 'required'],
            [['id_libro', 'id_editorial_fk'], 'string', 'max' => 11],
            [['nombre'], 'string', 'max' => 50],
            [['detalle'], 'string', 'max' => 100],
            [['id_libro'], 'unique'],
            [['id_editorial_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Editorial::class, 'targetAttribute' => ['id_editorial_fk' => 'id_editorial']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_libro' => 'Id Libro',
            'nombre' => 'Nombre',
            'detalle' => 'Detalle',
            'id_editorial_fk' => 'Id Editorial Fk',
        ];
    }

    /**
     * Gets query for [[Autors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::class, ['id_libro_FK' => 'id_libro']);
    }

    /**
     * Gets query for [[EditorialFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEditorialFk()
    {
        return $this->hasOne(Editorial::class, ['id_editorial' => 'id_editorial_fk']);
    }

    /**
     * Gets query for [[Generos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeneros()
    {
        return $this->hasMany(Genero::class, ['id_libro' => 'id_libro']);
    }
}
