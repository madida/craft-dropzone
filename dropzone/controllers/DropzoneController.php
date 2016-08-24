<?php
namespace Craft;

class DropzoneController extends BaseController
{

	/**
	 * Action to upload a file to an asset
	 * @return void Request ends
	 */
	public function actionUpload()
	{

		$input = craft()->request->getPost();

		$file = UploadedFile::getInstanceByName('file');

		$folder = craft()->assets->findFolder(array(
		    'id' => $input['id']
		));

		if ($folder) {
			$folderId = $input['id'];
		}

		craft()->assets->insertFileByLocalPath(
		    $file->getTempName(),
		    $file->getName(),
		    $folderId,
		    AssetConflictResolution::KeepBoth);

		craft()->end();
	}
}
