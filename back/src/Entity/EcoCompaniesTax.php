<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * EcoCompaniesTax
 *
 * @ORM\Table(name="eco_companies_tax")
 * @ORM\Entity
 */
class EcoCompaniesTax
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tax", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_companies_tax_id_tax_seq", allocationSize=1, initialValue=1)
     */
    private $idTax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", nullable=true)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unrestricted_value", type="string", nullable=true)
     */
    private $unrestrictedValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kpp", type="string", nullable=true)
     */
    private $kpp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="management_name", type="string", nullable=true)
     */
    private $managementName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="management_post", type="string", nullable=true)
     */
    private $managementPost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hid", type="string", nullable=true)
     */
    private $hid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_actuality_date", type="string", nullable=true)
     */
    private $stateActualityDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_registration_date", type="string", nullable=true)
     */
    private $stateRegistrationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_liquidation_date", type="string", nullable=true)
     */
    private $stateLiquidationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_status", type="string", nullable=true)
     */
    private $stateStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_code", type="string", nullable=true)
     */
    private $stateCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opf_code", type="string", nullable=true)
     */
    private $opfCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opf_full", type="string", nullable=true)
     */
    private $opfFull;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opf_short", type="string", nullable=true)
     */
    private $opfShort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opf_type", type="string", nullable=true)
     */
    private $opfType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_full_with_opf", type="string", nullable=true)
     */
    private $nameFullWithOpf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_short_with_opf", type="string", nullable=true)
     */
    private $nameShortWithOpf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_latin", type="string", nullable=true)
     */
    private $nameLatin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_full", type="string", nullable=true)
     */
    private $nameFull;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_short", type="string", nullable=true)
     */
    private $nameShort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inn", type="string", nullable=true)
     */
    private $inn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ogrn", type="string", nullable=true)
     */
    private $ogrn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ogrn_date", type="string", nullable=true)
     */
    private $ogrnDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okpo", type="string", nullable=true)
     */
    private $okpo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okato", type="string", nullable=true)
     */
    private $okato;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oktmo", type="string", nullable=true)
     */
    private $oktmo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okogu", type="string", nullable=true)
     */
    private $okogu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okfs", type="string", nullable=true)
     */
    private $okfs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okved", type="string", nullable=true)
     */
    private $okved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_value", type="string", nullable=true)
     */
    private $addressValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_unrestricted_value", type="string", nullable=true)
     */
    private $addressUnrestrictedValue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_country", type="string", nullable=true)
     */
    private $addressCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_federal_district", type="string", nullable=true)
     */
    private $addressFederalDistrict;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_region_with_type", type="string", nullable=true)
     */
    private $addressRegionWithType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_area_with_type", type="string", nullable=true)
     */
    private $addressAreaWithType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_geo_lat", type="string", nullable=true)
     */
    private $addressGeoLat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_geo_lon", type="string", nullable=true)
     */
    private $addressGeoLon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_source", type="string", nullable=true)
     */
    private $addressSource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phones", type="string", nullable=true)
     */
    private $phones;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emails", type="string", nullable=true)
     */
    private $emails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_timezone", type="string", nullable=true)
     */
    private $addressTimezone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okveds", type="string", nullable=true)
     */
    private $okveds;

    /**
     * @return int
     */
    public function getIdTax()
    {
        return $this->idTax;
    }

    /**
     * @param int $idTax
     */
    public function setIdTax($idTax)
    {
        $this->idTax = $idTax;
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getUnrestrictedValue()
    {
        return $this->unrestrictedValue;
    }

    /**
     * @param string|null $unrestrictedValue
     */
    public function setUnrestrictedValue($unrestrictedValue)
    {
        $this->unrestrictedValue = $unrestrictedValue;
    }

    /**
     * @return string|null
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * @param string|null $kpp
     */
    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
    }

    /**
     * @return string|null
     */
    public function getManagementName()
    {
        return $this->managementName;
    }

    /**
     * @param string|null $managementName
     */
    public function setManagementName($managementName)
    {
        $this->managementName = $managementName;
    }

    /**
     * @return string|null
     */
    public function getManagementPost()
    {
        return $this->managementPost;
    }

    /**
     * @param string|null $managementPost
     */
    public function setManagementPost($managementPost)
    {
        $this->managementPost = $managementPost;
    }

    /**
     * @return string|null
     */
    public function getHid()
    {
        return $this->hid;
    }

    /**
     * @param string|null $hid
     */
    public function setHid($hid)
    {
        $this->hid = $hid;
    }

    /**
     * @return string|null
     */
    public function getStateActualityDate()
    {
        return $this->stateActualityDate;
    }

    /**
     * @param string|null $stateActualityDate
     */
    public function setStateActualityDate($stateActualityDate)
    {
        $this->stateActualityDate = $stateActualityDate;
    }

    /**
     * @return string|null
     */
    public function getStateRegistrationDate()
    {
        return $this->stateRegistrationDate;
    }

    /**
     * @param string|null $stateRegistrationDate
     */
    public function setStateRegistrationDate($stateRegistrationDate)
    {
        $this->stateRegistrationDate = $stateRegistrationDate;
    }

    /**
     * @return string|null
     */
    public function getStateLiquidationDate()
    {
        return $this->stateLiquidationDate;
    }

    /**
     * @param string|null $stateLiquidationDate
     */
    public function setStateLiquidationDate($stateLiquidationDate)
    {
        $this->stateLiquidationDate = $stateLiquidationDate;
    }

    /**
     * @return string|null
     */
    public function getStateStatus()
    {
        return $this->stateStatus;
    }

    /**
     * @param string|null $stateStatus
     */
    public function setStateStatus($stateStatus)
    {
        $this->stateStatus = $stateStatus;
    }

    /**
     * @return string|null
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param string|null $stateCode
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;
    }

    /**
     * @return string|null
     */
    public function getOpfCode()
    {
        return $this->opfCode;
    }

    /**
     * @param string|null $opfCode
     */
    public function setOpfCode($opfCode)
    {
        $this->opfCode = $opfCode;
    }

    /**
     * @return string|null
     */
    public function getOpfFull()
    {
        return $this->opfFull;
    }

    /**
     * @param string|null $opfFull
     */
    public function setOpfFull($opfFull)
    {
        $this->opfFull = $opfFull;
    }

    /**
     * @return string|null
     */
    public function getOpfShort()
    {
        return $this->opfShort;
    }

    /**
     * @param string|null $opfShort
     */
    public function setOpfShort($opfShort)
    {
        $this->opfShort = $opfShort;
    }

    /**
     * @return string|null
     */
    public function getOpfType()
    {
        return $this->opfType;
    }

    /**
     * @param string|null $opfType
     */
    public function setOpfType($opfType)
    {
        $this->opfType = $opfType;
    }

    /**
     * @return string|null
     */
    public function getNameFullWithOpf()
    {
        return $this->nameFullWithOpf;
    }

    /**
     * @param string|null $nameFullWithOpf
     */
    public function setNameFullWithOpf($nameFullWithOpf)
    {
        $this->nameFullWithOpf = $nameFullWithOpf;
    }

    /**
     * @return string|null
     */
    public function getNameShortWithOpf()
    {
        return $this->nameShortWithOpf;
    }

    /**
     * @param string|null $nameShortWithOpf
     */
    public function setNameShortWithOpf($nameShortWithOpf)
    {
        $this->nameShortWithOpf = $nameShortWithOpf;
    }

    /**
     * @return string|null
     */
    public function getNameLatin()
    {
        return $this->nameLatin;
    }

    /**
     * @param string|null $nameLatin
     */
    public function setNameLatin($nameLatin)
    {
        $this->nameLatin = $nameLatin;
    }

    /**
     * @return string|null
     */
    public function getNameFull()
    {
        return $this->nameFull;
    }

    /**
     * @param string|null $nameFull
     */
    public function setNameFull($nameFull)
    {
        $this->nameFull = $nameFull;
    }

    /**
     * @return string|null
     */
    public function getNameShort()
    {
        return $this->nameShort;
    }

    /**
     * @param string|null $nameShort
     */
    public function setNameShort($nameShort)
    {
        $this->nameShort = $nameShort;
    }

    /**
     * @return string|null
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * @param string|null $inn
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }

    /**
     * @return string|null
     */
    public function getOgrn()
    {
        return $this->ogrn;
    }

    /**
     * @param string|null $ogrn
     */
    public function setOgrn($ogrn)
    {
        $this->ogrn = $ogrn;
    }

    /**
     * @return string|null
     */
    public function getOgrnDate()
    {
        return $this->ogrnDate;
    }

    /**
     * @param string|null $ogrnDate
     */
    public function setOgrnDate($ogrnDate)
    {
        $this->ogrnDate = $ogrnDate;
    }

    /**
     * @return string|null
     */
    public function getOkpo()
    {
        return $this->okpo;
    }

    /**
     * @param string|null $okpo
     */
    public function setOkpo($okpo)
    {
        $this->okpo = $okpo;
    }

    /**
     * @return string|null
     */
    public function getOkato()
    {
        return $this->okato;
    }

    /**
     * @param string|null $okato
     */
    public function setOkato($okato)
    {
        $this->okato = $okato;
    }

    /**
     * @return string|null
     */
    public function getOktmo()
    {
        return $this->oktmo;
    }

    /**
     * @param string|null $oktmo
     */
    public function setOktmo($oktmo)
    {
        $this->oktmo = $oktmo;
    }

    /**
     * @return string|null
     */
    public function getOkogu()
    {
        return $this->okogu;
    }

    /**
     * @param string|null $okogu
     */
    public function setOkogu($okogu)
    {
        $this->okogu = $okogu;
    }

    /**
     * @return string|null
     */
    public function getOkfs()
    {
        return $this->okfs;
    }

    /**
     * @param string|null $okfs
     */
    public function setOkfs($okfs)
    {
        $this->okfs = $okfs;
    }

    /**
     * @return string|null
     */
    public function getOkved()
    {
        return $this->okved;
    }

    /**
     * @param string|null $okved
     */
    public function setOkved($okved)
    {
        $this->okved = $okved;
    }

    /**
     * @return string|null
     */
    public function getAddressValue()
    {
        return $this->addressValue;
    }

    /**
     * @param string|null $addressValue
     */
    public function setAddressValue($addressValue)
    {
        $this->addressValue = $addressValue;
    }

    /**
     * @return string|null
     */
    public function getAddressUnrestrictedValue()
    {
        return $this->addressUnrestrictedValue;
    }

    /**
     * @param string|null $addressUnrestrictedValue
     */
    public function setAddressUnrestrictedValue($addressUnrestrictedValue)
    {
        $this->addressUnrestrictedValue = $addressUnrestrictedValue;
    }

    /**
     * @return string|null
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string|null $addressCountry
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;
    }

    /**
     * @return string|null
     */
    public function getAddressFederalDistrict()
    {
        return $this->addressFederalDistrict;
    }

    /**
     * @param string|null $addressFederalDistrict
     */
    public function setAddressFederalDistrict($addressFederalDistrict)
    {
        $this->addressFederalDistrict = $addressFederalDistrict;
    }

    /**
     * @return string|null
     */
    public function getAddressRegionWithType()
    {
        return $this->addressRegionWithType;
    }

    /**
     * @param string|null $addressRegionWithType
     */
    public function setAddressRegionWithType($addressRegionWithType)
    {
        $this->addressRegionWithType = $addressRegionWithType;
    }

    /**
     * @return string|null
     */
    public function getAddressAreaWithType()
    {
        return $this->addressAreaWithType;
    }

    /**
     * @param string|null $addressAreaWithType
     */
    public function setAddressAreaWithType($addressAreaWithType)
    {
        $this->addressAreaWithType = $addressAreaWithType;
    }

    /**
     * @return string|null
     */
    public function getAddressGeoLat()
    {
        return $this->addressGeoLat;
    }

    /**
     * @param string|null $addressGeoLat
     */
    public function setAddressGeoLat($addressGeoLat)
    {
        $this->addressGeoLat = $addressGeoLat;
    }

    /**
     * @return string|null
     */
    public function getAddressGeoLon()
    {
        return $this->addressGeoLon;
    }

    /**
     * @param string|null $addressGeoLon
     */
    public function setAddressGeoLon($addressGeoLon)
    {
        $this->addressGeoLon = $addressGeoLon;
    }

    /**
     * @return string|null
     */
    public function getAddressSource()
    {
        return $this->addressSource;
    }

    /**
     * @param string|null $addressSource
     */
    public function setAddressSource($addressSource)
    {
        $this->addressSource = $addressSource;
    }

    /**
     * @return string|null
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param string|null $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return string|null
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param string|null $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return string|null
     */
    public function getAddressTimezone()
    {
        return $this->addressTimezone;
    }

    /**
     * @param string|null $addressTimezone
     */
    public function setAddressTimezone($addressTimezone)
    {
        $this->addressTimezone = $addressTimezone;
    }

    /**
     * @return string|null
     */
    public function getOkveds()
    {
        return $this->okveds;
    }

    /**
     * @param string|null $okveds
     */
    public function setOkveds($okveds)
    {
        $this->okveds = $okveds;
    }


}
