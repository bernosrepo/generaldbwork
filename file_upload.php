<?php
require_once 'vendor/autoload.php';
$settings = include('Settings.php');

use Office365\Runtime\Auth\UserCredentials;
use Office365\Runtime\Auth\ClientCredential;
use Office365\SharePoint\ClientContext;

function uploadFileAlt(ClientContext $ctx, $sourceFilePath, $targetFileUrl)
{
    $fileContent = file_get_contents($sourceFilePath);
    try {
        Office365\SharePoint\File::saveBinary($ctx, $targetFileUrl, $fileContent);
        print "File has been uploaded\r\n";
    } catch (Exception $e) {
        print "File upload failed:\r\n";
    }
}


try {
   $credentials = new UserCredentials($settings['UserName'], $settings['Password']);
    // $credentials = new ClientCredential($settings['ClientId'], $settings['ClientSecret']);
    $ctx = (new ClientContext($settings['Url']))->withCredentials($credentials);
    $localPath = "C:\Bitnami\wampstack-7.4.24-0\apache2\htdocs\spo\phpSPO\examples\data";
    $targetLibraryTitle = "Documents";
    $targetList = $ctx->getWeb()->getLists()->getByTitle($targetLibraryTitle);

    $searchPrefix = $localPath . '*.*';
    echo "local path";
    var_dump(glob($localPath));
    $filename = "C:\Bitnami\wampstack-7.4.24-0\apache2\htdocs\spo\phpSPO\examples\data\gashaw.xls";
    $uploadFile = $targetList->getRootFolder()->uploadFile(basename($filename),file_get_contents($filename));
    $ctx->executeQuery();
    print "File {$uploadFile->getServerRelativeUrl()} has been uploaded\r\n";

    // echo "===========------------===============";
    // foreach(glob($searchPrefix) as $filename) {
    //     echo "test";
    //     $uploadFile = $targetList->getRootFolder()->uploadFile(basename($filename),file_get_contents($filename));
    //     $ctx->executeQuery();
    //     print "File {$uploadFile->getServerRelativeUrl()} has been uploaded\r\n";
    //     echo "***********************************";
    // }fggdf

}
catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "\n";
    echo "-------------------------------";
}

