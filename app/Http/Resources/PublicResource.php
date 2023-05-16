<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicResource extends JsonResource
{
    public static $wrap = null;

    public function __construct(public $resource, public $pid, public $status, public $message)
    {
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'pid' => $this->pid,
            'message' => $this->message,
            'resource' => $this->resource,
        ];
    }
}
