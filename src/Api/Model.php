<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use Otis22\VetmanagerApi\Stringify;
use Otis22\VetmanagerApi\VetmanagerApiException;

class Model implements Stringify
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var array<string>
     */
    private $validModels = [
        'invoice',
        'client',
        'city',
        'admission',
        'breed',
        'cassa',
        'cassaclose',
        'cassarashod',
        'city',
        'cityType',
        'clientPhone',
        'clinics',
        'clinicsToClients',
        'clinicsToDocuments',
        'closingOfInvoices',
        'comboManualItem',
        'comboManualName',
        'diagnoses',
        'doctorsResponsible',
        'failedHook',
        'fiscalRegister',
        'fiscalRegisterData',
        'good',
        'goodGroup',
        'goodSaleParam',
        'hospitalBlock',
        'hospital',
        'invoiceDocument',
        'lastTime',
        'medicalCards',
        'partyAccount',
        'partyAccountDoc',
        'payment',
        'pet',
        'petType',
        'properties',
        'report',
        'role',
        'servicePrice',
        'storeDocument',
        'storeDocumentOperation',
        'stores',
        'street',
        'suppliers',
        'timesheet',
        'timesheetTypes',
        'unit',
        'user',
        'userCalls',
        'userConfig',
        'userPosition',
        'usersHistory'
    ];

    /**
     * Model constructor.
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    public function asString(): string
    {
        if (in_array($this->model, $this->validModels)) {
            return $this->model;
        }
        throw new VetmanagerApiException("Model is not valid");
    }

    /**
     * @return string
     * @throws VetmanagerApiException
     */
    public function __toString(): string
    {
        return $this->asString();
    }
}
