<?php

namespace App\Models\Traits;

use App\Models\Blog;
use App\Models\User;
use App\Models\Event;

trait StatusableTrait
{
    protected $statusColumn = 'status';

    protected $statusTpl = '<span class="badge {statusClass}">{statusText}</span>';

    public function setStatusColumn($status)
    {
        $this->statusColumn = $status;
        return $this;
    }

    public function setStatusTpl($tpl)
    {
        $this->statusTpl = $tpl;
        return $this;
    }

    public function getStatusText($asHtml = false)
    {
        $status = $this->{$this->statusColumn};
        $text = '';

        if (Blog::class == get_class()) {
            switch ($status) {
                case Blog::STATUS_HIDE:
                    $text = $this->transformStatus('Hide', $asHtml, 'badge-secondary');
                    break;

                case Blog::STATUS_PUBLISH:
                    $text = $this->transformStatus('Publish', $asHtml, 'badge-success');
                    break;
            }
        }

        elseif (User::class == get_class()) {
            switch ($status) {
                case User::STATUS_NORMAL:
                    $text = $this->transformStatus('Normal', $asHtml, 'badge-primary');
                    break;

                case User::STATUS_PRIVATE:
                    $text = $this->transformStatus('Private', $asHtml, 'badge-secondary');
                    break;

                case User::STATUS_BLOCK:
                    $text = $this->transformStatus('Block', $asHtml, 'badge-danger');
                    break;
            }
        }

        elseif (Event::class == get_class()) {
            switch ($status) {
                case Event::STATUS_HIDE:
                    $text = $this->transformStatus('Hide', $asHtml, 'badge-secondary');
                    break;

                case Event::STATUS_PUBLISH:
                    $text = $this->transformStatus('Publish', $asHtml, 'badge-success');
                    break;
            }
        }

        return $text;
    }

    private function transformStatus($text, $asHtml = false, $className = null)
    {
        return !$asHtml ? $text : str_replace(
            ['{statusClass}', '{statusText}'],
            [$className ?: 'badge-secondary', $text],
            $this->statusTpl
        );
    }
}
