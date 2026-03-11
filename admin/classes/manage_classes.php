<?php

class ManageClasses {
    private $classes = [];

    public function listClasses() {
        return $this->classes;
    }

    public function addClass($className) {
        if (!empty($className)) {
            $this->classes[] = $className;
            return "$className added successfully.";
        } else {
            return "Class name cannot be empty.";
        }
    }

    public function editClass($index, $newName) {
        if (isset($this->classes[$index])) {
            $this->classes[$index] = $newName;
            return "Class updated successfully.";
        } else {
            return "Class not found.";
        }
    }

    public function deleteClass($index) {
        if (isset($this->classes[$index])) {
            unset($this->classes[$index]);
            $this->classes = array_values($this->classes); // Reindex the array
            return "Class deleted successfully.";
        } else {
            return "Class not found.";
        }
    }
}

?>