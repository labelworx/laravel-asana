<?php


namespace Torann\LaravelAsana;

use Illuminate\Support\Str;

class AsanaTask
{

    protected $assignee;
    protected $custom_fields = [];
    protected $due_at;
    protected $due_on;
    protected $followers = [];
    protected $name;
    protected $notes;
    protected $parent;
    protected $projects = [];
    protected $tags = [];
    protected $workspace;

    private $data = [];

    public function buildTaskData()
    {
        $this->setAssignee();
        $this->setCustomFields();
        $this->setDueAt();
        $this->setDueOn();
        $this->setFollowers();
        $this->setName();
        $this->setNotes();
        $this->setParent();
        $this->setProjects();
        $this->setTags();
        $this->setWorkspace();

        return $this->data;
    }

    private function setAssignee() {
        if (Str::length($this->assignee)) {
            $this->data['assignee'] = $this->assignee;
        }
    }

    private function setCustomFields() {
        if (is_array($this->custom_fields) && count($this->custom_fields)) {
            $this->data['custom_fields'] = $this->custom_fields;
        }
    }

    private function setDueAt() {
        if (Str::length($this->due_at)) {
            $this->data['due_at'] = $this->due_at;
        }
    }

    private function setDueOn() {
        if (Str::length($this->due_on)) {
            $this->data['due_on'] = $this->due_on;
        }
    }

    private function setFollowers() {
        if (is_array($this->followers) && count($this->followers)) {
            $this->data['followers'] = $this->followers;
        }
    }

    private function setName() {
        if (Str::length($this->name)) {
            $this->data['name'] = $this->name;
        }
    }

    private function setNotes() {
        if (Str::length($this->notes)) {
            $this->data['notes'] = $this->notes;
        }
    }

    private function setParent() {
        if (Str::length($this->parent)) {
            $this->data['parent'] = $this->parent;
        }
    }

    private function setProjects() {
        if (is_array($this->projects) && count($this->projects)) {
            $this->data['projects'] = $this->projects;
        }
    }

    private function setTags() {
        if (is_array($this->tags) && count($this->tags)) {
            $this->data['tags'] = $this->tags;
        }
    }

    private function setWorkspace()
    {
        if (Str::length($this->workspace)) {
            $this->data['workspace'] = $this->workspace;
        }
    }

}
