<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class PatientSearch extends Patient
{
    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search($params): ActiveDataProvider
    {
        $query = self::find();

        $query->with(["status", "polyclinic", "treatment", "formDisease", "updatedBy"]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 100),
            ],
            'sort'=>[
                'defaultOrder'=>[
                    'updated'=>SORT_DESC,
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'polyclinic_id' => $this->polyclinic_id,
            'status_id' => $this->status_id,
            'form_disease_id' => $this->form_disease_id,
            'treatment_id' => $this->treatment_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
