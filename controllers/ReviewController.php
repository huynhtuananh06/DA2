<?php
// require_once 'core/baseController.php';
class ReviewController extends baseController{
    public function review() {
        $reviewModel = new ReviewModel();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tourID_form = $_POST['tourID'];
        $userID = $_SESSION['user']['userID'];
       
        $data= [
            'tourID' => $tourID_form,
            'userID' => $userID,
            'comment'=> $_POST['binhluan']
        ];
        $reviewModel->insertReview($data);
         $model = $reviewModel->getReviewBytourId($tourID_form);
         $this->renderView('booking',['review'=>$model]);
        }
        

    }
}