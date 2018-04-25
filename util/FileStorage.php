<?php


namespace util;


use core\Config;
use model\File;
use repository\FileRepository;

class FileStorage
{
    /**
     * @var FileStorage
     */
    private static $instance;

    /**
     * @var FileRepository
     */
    private $fileRepository;

    private function __construct()
    {
        $this->fileRepository = new FileRepository();
    }

    /**
     * Returns singleton instance of FileStorage
     * creates one if non exists
     * @return FileStorage
     */
    public static function getInstance(): FileStorage
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param array $file $_FILE array for uploaded file
     * @param string $fileCategory category of file e.g. invoice, document etc.
     */
    public function store(array $file, string $fileCategory)
    {
        if ($file['error'] != UPLOAD_ERR_OK) {
            throw new \RuntimeException("Error uploading file");
        }

        if ($file['size'] > Config::getMaxFileSize()) {
            throw new \RuntimeException("File is too big");
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $name = sha1_file($file['tmp_name']) . '.' . $extension;
        $path = Config::getFilesLocation() . $name;

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            throw new \RuntimeException("Error saving file");
        }

        $this->saveToDatabase($file, $fileCategory, $path);
    }

    /**
     * @param int $fileId id of file in database
     * @return bool|File on success File with metadata or FALSE on failure
     */
    public function getFileInfo(int $fileId)
    {
        return $this->getFromDatabase($fileId);
    }

    /**
     * Removes file from system
     * @param int $fileId id of file in database
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete(int $fileId): bool
    {
        $file = $this->getFromDatabase($fileId);
        if ($file) {
            $this->deleteFromDatabase($file->getId());
            unlink($file->getPath());

            return true;
        }

        return false;
    }

    /**
     * Begins file download by client
     * @param int $fileId id of file
     */
    public function download(int $fileId)
    {
        $file = $this->getFromDatabase($fileId);
        if ($file) {
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $file->getType());
            Header('Content-Disposition: attachment; filename="' . $file->getName() . '"');
            header('Cache-Control: must-revalidate');
            header('Expires: 0');
            header('Content-Length: ' . filesize($file->getPath()));
            readfile($file->getPath());
            exit();
        }
    }

    private function saveToDatabase(array $file, string $fileCategory, string $path)
    {
        $storedFile = new File();
        $storedFile->setName($file['name'])
            ->setCategory($fileCategory)
            ->setSize($file['size'])
            ->setType($file['type'])
            ->setPath($path);

        $this->fileRepository->add($storedFile);
    }

    /**
     * @param int $fileId
     * @return File|bool
     */
    private function getFromDatabase(int $fileId)
    {
        return $this->fileRepository->findById($fileId);
    }

    private function deleteFromDatabase(int $fileId): bool
    {
        return $this->fileRepository->delete($fileId);
    }
}
