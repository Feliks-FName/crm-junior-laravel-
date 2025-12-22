<?php

namespace App\Services\Deal;

use App\Models\Client;
use App\Models\Deal;
use Illuminate\Support\Facades\DB;

class CreateDealService
{

    public function create(array $data): Deal
    {
        return DB::transaction(function () use ($data) {
            // 1. Найти или создать контакт
            $client = $this->findOrCreateClient($data);

            // 2. Создать сделку
            return Deal::create([
                'name' => $data['name'],
                'user_id' => $data['user_id'],
                'client_id' => $client->id,
                'status_id' => $data['status_id'],
                'comments' => $data['comments'] ?? null,
                'utm_source' => $data['utm_source'] ?? null,
                'utm_medium' => $data['utm_medium'] ?? null,
                'utm_campaign' => $data['utm_campaign'] ?? null,
                'utm_content' => $data['utm_content'] ?? null,
                'utm_term' => $data['utm_term'] ?? null,
            ]);
        });
    }

    private function findOrCreateClient(array $data): Client
    {
        $query = Client::query();

        if (!empty($data['email_client'])) {
            $query->where('email', '=', $data['email_client']);
        }

        if (!empty($data['phone_client'])) {
            $query->orWhere('phone', '=', $data['phone_client']);
        }

        $client = $query->first();
        if ($client) {
            return $client;
        }

        return Client::create([
            'name' => $data['name_client'],
            'email' => $data['email_client'] ?? null,
            'phone' => $data['phone_client'] ?? null,
            'company' => $data['company_client_name'] ?? null,
        ]);

    }

}
