<?php
class DeleteHelper {

    public static function deleteAction($id){
        $rsAction = MyAction::model()->findAll("pid = " . $id);

        if ($rsAction) {
            foreach ($rsAction as $rwAction) {
                DeleteHelper::deleteAction(($rwAction['id']));
            }
        }
        else {
            MyAction::model()->deleteByPk($id);
        }
        return true;
    }

    public static function deletePlan($id){
        $rsPlan = MyPlan::model()->findAll("pid = " . $id);

        if ($rsPlan) {
            foreach ($rsPlan as $rwPlan) {
                DeleteHelper::deletePlan(($rwPlan['id']));
            }
        }
        else {
            try {
                if (MyPlan::model()->deleteByPk($id)){
                    return true;
                }
            }
            catch (CDbException $e){
                return false;
            }
        }
        return true;
    }

    public static function deleteFamily($id){

        $isSubObjectDeleted = true;

        $rsMember = MyMember::model()->findAll("family_id = " . $id);
        foreach ($rsMember as $rwMember){
            if (! DeleteHelper::deleteMember($rwMember['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsCurrentIp = MyCurrentIp::model()->findAll("family_id = " . $id);
        foreach ($rsCurrentIp as $rwCurrentIp){
            if (! DeleteHelper::deleteCurrentIp($rwCurrentIp['id'])){
                $isSubObjectDeleted = false;
            }
        }

        if ($isSubObjectDeleted) {
            try {
                if (MyFamily::model()->deleteByPk($id)) {
                    return true;
                }
            }
            catch (CDbException $e){
                return false;
            }
        }

        return false;
    }

    public static function deleteMember($id){
        try {
            if (MyMember::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }

    public static function deleteCurrentIp($id){
        try {
            if (MyCurrentIp::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }


    public static function deleteCategory($id){
        $isSubObjectDeleted = true;

        $rsBusiness = MyBusiness::model()->findAll("category_id = " . $id);
        foreach ($rsBusiness as $rwBusiness){
            if (! DeleteHelper::deleteBusiness($rwBusiness['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsMarket = MyMarket::model()->findAll("category_id = " . $id);
        foreach ($rsMarket as $rwMarket){
            if (! DeleteHelper::deleteMarket($rwMarket['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsCurrentIp = MyCurrentIp::model()->findAll("category_id = " . $id);
        foreach ($rsCurrentIp as $rwCurrentIp){
            if (! DeleteHelper::deleteCurrentIp($rwCurrentIp['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsDesiredIp = MyDesiredIp::model()->findAll("category_id = " . $id);
        foreach ($rsDesiredIp as $rwDesiredIp){
            if (! DeleteHelper::deleteDesiredIp($rwDesiredIp['id'])){
                $isSubObjectDeleted = false;
            }
        }

        if ($isSubObjectDeleted) {
            try {
                if (MyCategory::model()->deleteByPk($id)) {
                    return true;
                }
            }
            catch (CDbException $e){
                return false;
            }
        }

        return false;
    }

    public static function deleteDesiredIp($id){
        try {
            if (MyDesiredIp::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }

    public  static function deleteBusiness($id){
        try {
            if (MyBusiness::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }

    public static function deleteMarket($id){
        try {
            if (MyMarket::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }


    public static function deleteProject($id){
        $isSubObjectDeleted = true;

        $rsPlan = MyPlan::model()->findAll("project_id = " . $id . " AND pid IS NULL");
        foreach ($rsPlan as $rwPlan){
            if (! DeleteHelper::deletePlan($rwPlan['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsProjectAccess = MyProjectAccess::model()->findAll("project_id = " . $id);
        foreach ($rsProjectAccess as $rwProjectAccess){
            if (! DeleteHelper::deleteProjectAccess($rwProjectAccess['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsFamily = MyFamily::model()->findAll("project_id = " . $id);
        foreach ($rsFamily as $rwFamily){
            if (! DeleteHelper::deleteFamily($rwFamily['id'])){
                $isSubObjectDeleted = false;
            }
        }

        $rsCategory = MyCategory::model()->findAll("project_id = " . $id);
        foreach ($rsCategory as $rwCategory){
            if (! DeleteHelper::deleteCategory($rwCategory['id'])){
                $isSubObjectDeleted = false;
            }
        }

        if ($isSubObjectDeleted){
            try {
                if (MyProject::model()->deleteByPk($id)) {
                    return true;
                }
            }
            catch (CDbException $e){
                return false;
            }
        }

        return false;
    }

    public static function deleteProjectAccess($id){
        try {
            if (MyProjectAccess::model()->deleteByPk($id)) {
                return true;
            }
        }
        catch (CDbException $e){
            return false;
        }

        return false;
    }
}