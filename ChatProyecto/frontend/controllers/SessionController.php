<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SessionFrontendUser;
use frontend\models\SessionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * SessionController implements the CRUD actions for SessionFrontendUser model.
 */
class SessionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SessionFrontendUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SessionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$sesiones = new \frontend\models\SessionFrontendUser();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SessionFrontendUser model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        //return $this->render('view', [
        //    'model' => $this->findModel($id),
        //]);
        
        $model = $this->findModel($id);
        $model2 = new \frontend\models\Amigos;
        $model5 = new SessionFrontendUser();
        $sql = "SELECT * FROM session_frontend_user";  // sentencia sql
        $link = mysqli_connect("localhost","root","","chatusip");
            $result = mysqli_query($link,$sql);
            $numero = mysqli_num_rows($result); // obtenemos el n�mero de filas
            $rows = mysqli_fetch_array($result);
           do
                {
                //$id = $id + $rows['Id'];
                  if($id == $rows['id']){
                      //$id = $rows['user_id'];
                        $resultado = $rows['user_id'];
                  }
                }
                 while( $rows = mysqli_fetch_array($result) );
               
            return $this->render('view', [
            'model' => $this->findModel($id),
            $model2->Id_Usuario = \Yii::$app->User->getId(),
            
            $model2->Id_Amigo = $resultado,           
            $model2->save(),
        ]);
    }

    /**
     * Creates a new SessionFrontendUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SessionFrontendUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SessionFrontendUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SessionFrontendUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
       /* $sesiones = new \frontend\models\SessionFrontendUser();
        for($i = 0;$i<=count($sesiones);$i++){
            if($sesiones->user_id[$i] == NULL){
                $this->findModel($sesiones->id[$i])->delete();
              }
            }*/

        return $this->redirect(['index']);
    }

    /**
     * Finds the SessionFrontendUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SessionFrontendUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SessionFrontendUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
