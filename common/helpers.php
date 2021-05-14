<?php
/**
 * User: Komsy
 * Date: 11/07/2021
 * Time: 3:25 PM
 */

function isGuest()
{
    return Yii::$app->user->isGuest;
}

function currUserId()
{
    return Yii::$app->user->id;
}

function param($key)
{
    return Yii::$app->params[$key];
}