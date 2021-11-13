<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EcoOrgNvos
 *
 * @ORM\Table(name="eco_org_nvos")
 * @ORM\Entity
 */
class EcoOrgNvos
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_nvos", type="decimal", precision=38, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="eco_org_nvos_id_nvos_seq", allocationSize=1, initialValue=1)
     */
    private $idNvos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="klass", type="string", length=250, nullable=true)
     */
    private $klass;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_obj", type="string", length=2500, nullable=true)
     */
    private $nameObj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oktmo", type="string", length=250, nullable=true)
     */
    private $oktmo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress_mesto", type="string", length=2500, nullable=true)
     */
    private $adressMesto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_eksp_org", type="string", length=2500, nullable=true)
     */
    private $nameEkspOrg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress_ur", type="string", length=2500, nullable=true)
     */
    private $adressUr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="inn", type="string", length=250, nullable=true)
     */
    private $inn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ogrn", type="string", length=250, nullable=true)
     */
    private $ogrn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="organ_vid", type="string", length=250, nullable=true)
     */
    private $organVid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="organ_kontr", type="string", length=250, nullable=true)
     */
    private $organKontr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okpd", type="string", length=250, nullable=true)
     */
    private $okpd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="okved", type="string", length=500, nullable=true)
     */
    private $okved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kat_obj", type="string", length=250, nullable=true)
     */
    private $katObj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uroven", type="string", length=250, nullable=true)
     */
    private $uroven;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kat_nvos", type="string", length=500, nullable=true)
     */
    private $katNvos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ras_vib", type="string", length=250, nullable=true)
     */
    private $nomRasVib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_vib_beg", type="string", length=250, nullable=true)
     */
    private $dateRasVibBeg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_vib_end", type="string", length=250, nullable=true)
     */
    private $dateRasVibEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kol_ist_vib", type="string", length=250, nullable=true)
     */
    private $kolIstVib;

    /**
     * @var string|null
     *
     * @ORM\Column(name="summ_vibros", type="string", length=250, nullable=true)
     */
    private $summVibros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ras_sbros", type="string", length=250, nullable=true)
     */
    private $nomRasSbros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_sbros_beg", type="string", length=250, nullable=true)
     */
    private $dateRasSbrosBeg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_sbros_end", type="string", length=250, nullable=true)
     */
    private $dateRasSbrosEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kol_sbros", type="string", length=250, nullable=true)
     */
    private $kolSbros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="summ_sbros", type="string", length=250, nullable=true)
     */
    private $summSbros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ras_rasm", type="string", length=250, nullable=true)
     */
    private $nomRasRasm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_rasm_beg", type="string", length=250, nullable=true)
     */
    private $dateRasRasmBeg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_ras_rasm_end", type="string", length=250, nullable=true)
     */
    private $dateRasRasmEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kol_rasm", type="string", length=250, nullable=true)
     */
    private $kolRasm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="summ_mas_oth", type="string", length=250, nullable=true)
     */
    private $summMasOth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vib_par_gas", type="string", length=250, nullable=true)
     */
    private $vibParGas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_post_uch", type="string", length=250, nullable=true)
     */
    private $datePostUch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_act_sved", type="string", length=250, nullable=true)
     */
    private $dateActSved;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_iskl", type="string", length=250, nullable=true)
     */
    private $dateIskl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_vvoda", type="string", length=250, nullable=true)
     */
    private $dateVvoda;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vodo_zona", type="string", length=250, nullable=true)
     */
    private $vodoZona;

    /**
     * @var string|null
     *
     * @ORM\Column(name="glubok_vipuski", type="string", length=250, nullable=true)
     */
    private $glubokVipuski;

    /**
     * @return string
     */
    public function getIdNvos(): string
    {
        return $this->idNvos;
    }

    /**
     * @param string $idNvos
     */
    public function setIdNvos(string $idNvos): void
    {
        $this->idNvos = $idNvos;
    }

    /**
     * @return string|null
     */
    public function getKlass(): ?string
    {
        return $this->klass;
    }

    /**
     * @param string|null $klass
     */
    public function setKlass(?string $klass): void
    {
        $this->klass = $klass;
    }

    /**
     * @return string|null
     */
    public function getNameObj(): ?string
    {
        return $this->nameObj;
    }

    /**
     * @param string|null $nameObj
     */
    public function setNameObj(?string $nameObj): void
    {
        $this->nameObj = $nameObj;
    }

    /**
     * @return string|null
     */
    public function getOktmo(): ?string
    {
        return $this->oktmo;
    }

    /**
     * @param string|null $oktmo
     */
    public function setOktmo(?string $oktmo): void
    {
        $this->oktmo = $oktmo;
    }

    /**
     * @return string|null
     */
    public function getAdressMesto(): ?string
    {
        return $this->adressMesto;
    }

    /**
     * @param string|null $adressMesto
     */
    public function setAdressMesto(?string $adressMesto): void
    {
        $this->adressMesto = $adressMesto;
    }

    /**
     * @return string|null
     */
    public function getNameEkspOrg(): ?string
    {
        return $this->nameEkspOrg;
    }

    /**
     * @param string|null $nameEkspOrg
     */
    public function setNameEkspOrg(?string $nameEkspOrg): void
    {
        $this->nameEkspOrg = $nameEkspOrg;
    }

    /**
     * @return string|null
     */
    public function getAdressUr(): ?string
    {
        return $this->adressUr;
    }

    /**
     * @param string|null $adressUr
     */
    public function setAdressUr(?string $adressUr): void
    {
        $this->adressUr = $adressUr;
    }

    /**
     * @return string|null
     */
    public function getInn(): ?string
    {
        return $this->inn;
    }

    /**
     * @param string|null $inn
     */
    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    /**
     * @return string|null
     */
    public function getOgrn(): ?string
    {
        return $this->ogrn;
    }

    /**
     * @param string|null $ogrn
     */
    public function setOgrn(?string $ogrn): void
    {
        $this->ogrn = $ogrn;
    }

    /**
     * @return string|null
     */
    public function getOrganVid(): ?string
    {
        return $this->organVid;
    }

    /**
     * @param string|null $organVid
     */
    public function setOrganVid(?string $organVid): void
    {
        $this->organVid = $organVid;
    }

    /**
     * @return string|null
     */
    public function getOrganKontr(): ?string
    {
        return $this->organKontr;
    }

    /**
     * @param string|null $organKontr
     */
    public function setOrganKontr(?string $organKontr): void
    {
        $this->organKontr = $organKontr;
    }

    /**
     * @return string|null
     */
    public function getOkpd(): ?string
    {
        return $this->okpd;
    }

    /**
     * @param string|null $okpd
     */
    public function setOkpd(?string $okpd): void
    {
        $this->okpd = $okpd;
    }

    /**
     * @return string|null
     */
    public function getOkved(): ?string
    {
        return $this->okved;
    }

    /**
     * @param string|null $okved
     */
    public function setOkved(?string $okved): void
    {
        $this->okved = $okved;
    }

    /**
     * @return string|null
     */
    public function getKatObj(): ?string
    {
        return $this->katObj;
    }

    /**
     * @param string|null $katObj
     */
    public function setKatObj(?string $katObj): void
    {
        $this->katObj = $katObj;
    }

    /**
     * @return string|null
     */
    public function getUroven(): ?string
    {
        return $this->uroven;
    }

    /**
     * @param string|null $uroven
     */
    public function setUroven(?string $uroven): void
    {
        $this->uroven = $uroven;
    }

    /**
     * @return string|null
     */
    public function getKatNvos(): ?string
    {
        return $this->katNvos;
    }

    /**
     * @param string|null $katNvos
     */
    public function setKatNvos(?string $katNvos): void
    {
        $this->katNvos = $katNvos;
    }

    /**
     * @return string|null
     */
    public function getNomRasVib(): ?string
    {
        return $this->nomRasVib;
    }

    /**
     * @param string|null $nomRasVib
     */
    public function setNomRasVib(?string $nomRasVib): void
    {
        $this->nomRasVib = $nomRasVib;
    }

    /**
     * @return string|null
     */
    public function getDateRasVibBeg(): ?string
    {
        return $this->dateRasVibBeg;
    }

    /**
     * @param string|null $dateRasVibBeg
     */
    public function setDateRasVibBeg(?string $dateRasVibBeg): void
    {
        $this->dateRasVibBeg = $dateRasVibBeg;
    }

    /**
     * @return string|null
     */
    public function getDateRasVibEnd(): ?string
    {
        return $this->dateRasVibEnd;
    }

    /**
     * @param string|null $dateRasVibEnd
     */
    public function setDateRasVibEnd(?string $dateRasVibEnd): void
    {
        $this->dateRasVibEnd = $dateRasVibEnd;
    }

    /**
     * @return string|null
     */
    public function getKolIstVib(): ?string
    {
        return $this->kolIstVib;
    }

    /**
     * @param string|null $kolIstVib
     */
    public function setKolIstVib(?string $kolIstVib): void
    {
        $this->kolIstVib = $kolIstVib;
    }

    /**
     * @return string|null
     */
    public function getSummVibros(): ?string
    {
        return $this->summVibros;
    }

    /**
     * @param string|null $summVibros
     */
    public function setSummVibros(?string $summVibros): void
    {
        $this->summVibros = $summVibros;
    }

    /**
     * @return string|null
     */
    public function getNomRasSbros(): ?string
    {
        return $this->nomRasSbros;
    }

    /**
     * @param string|null $nomRasSbros
     */
    public function setNomRasSbros(?string $nomRasSbros): void
    {
        $this->nomRasSbros = $nomRasSbros;
    }

    /**
     * @return string|null
     */
    public function getDateRasSbrosBeg(): ?string
    {
        return $this->dateRasSbrosBeg;
    }

    /**
     * @param string|null $dateRasSbrosBeg
     */
    public function setDateRasSbrosBeg(?string $dateRasSbrosBeg): void
    {
        $this->dateRasSbrosBeg = $dateRasSbrosBeg;
    }

    /**
     * @return string|null
     */
    public function getDateRasSbrosEnd(): ?string
    {
        return $this->dateRasSbrosEnd;
    }

    /**
     * @param string|null $dateRasSbrosEnd
     */
    public function setDateRasSbrosEnd(?string $dateRasSbrosEnd): void
    {
        $this->dateRasSbrosEnd = $dateRasSbrosEnd;
    }

    /**
     * @return string|null
     */
    public function getKolSbros(): ?string
    {
        return $this->kolSbros;
    }

    /**
     * @param string|null $kolSbros
     */
    public function setKolSbros(?string $kolSbros): void
    {
        $this->kolSbros = $kolSbros;
    }

    /**
     * @return string|null
     */
    public function getSummSbros(): ?string
    {
        return $this->summSbros;
    }

    /**
     * @param string|null $summSbros
     */
    public function setSummSbros(?string $summSbros): void
    {
        $this->summSbros = $summSbros;
    }

    /**
     * @return string|null
     */
    public function getNomRasRasm(): ?string
    {
        return $this->nomRasRasm;
    }

    /**
     * @param string|null $nomRasRasm
     */
    public function setNomRasRasm(?string $nomRasRasm): void
    {
        $this->nomRasRasm = $nomRasRasm;
    }

    /**
     * @return string|null
     */
    public function getDateRasRasmBeg(): ?string
    {
        return $this->dateRasRasmBeg;
    }

    /**
     * @param string|null $dateRasRasmBeg
     */
    public function setDateRasRasmBeg(?string $dateRasRasmBeg): void
    {
        $this->dateRasRasmBeg = $dateRasRasmBeg;
    }

    /**
     * @return string|null
     */
    public function getDateRasRasmEnd(): ?string
    {
        return $this->dateRasRasmEnd;
    }

    /**
     * @param string|null $dateRasRasmEnd
     */
    public function setDateRasRasmEnd(?string $dateRasRasmEnd): void
    {
        $this->dateRasRasmEnd = $dateRasRasmEnd;
    }

    /**
     * @return string|null
     */
    public function getKolRasm(): ?string
    {
        return $this->kolRasm;
    }

    /**
     * @param string|null $kolRasm
     */
    public function setKolRasm(?string $kolRasm): void
    {
        $this->kolRasm = $kolRasm;
    }

    /**
     * @return string|null
     */
    public function getSummMasOth(): ?string
    {
        return $this->summMasOth;
    }

    /**
     * @param string|null $summMasOth
     */
    public function setSummMasOth(?string $summMasOth): void
    {
        $this->summMasOth = $summMasOth;
    }

    /**
     * @return string|null
     */
    public function getVibParGas(): ?string
    {
        return $this->vibParGas;
    }

    /**
     * @param string|null $vibParGas
     */
    public function setVibParGas(?string $vibParGas): void
    {
        $this->vibParGas = $vibParGas;
    }

    /**
     * @return string|null
     */
    public function getDatePostUch(): ?string
    {
        return $this->datePostUch;
    }

    /**
     * @param string|null $datePostUch
     */
    public function setDatePostUch(?string $datePostUch): void
    {
        $this->datePostUch = $datePostUch;
    }

    /**
     * @return string|null
     */
    public function getDateActSved(): ?string
    {
        return $this->dateActSved;
    }

    /**
     * @param string|null $dateActSved
     */
    public function setDateActSved(?string $dateActSved): void
    {
        $this->dateActSved = $dateActSved;
    }

    /**
     * @return string|null
     */
    public function getDateIskl(): ?string
    {
        return $this->dateIskl;
    }

    /**
     * @param string|null $dateIskl
     */
    public function setDateIskl(?string $dateIskl): void
    {
        $this->dateIskl = $dateIskl;
    }

    /**
     * @return string|null
     */
    public function getDateVvoda(): ?string
    {
        return $this->dateVvoda;
    }

    /**
     * @param string|null $dateVvoda
     */
    public function setDateVvoda(?string $dateVvoda): void
    {
        $this->dateVvoda = $dateVvoda;
    }

    /**
     * @return string|null
     */
    public function getVodoZona(): ?string
    {
        return $this->vodoZona;
    }

    /**
     * @param string|null $vodoZona
     */
    public function setVodoZona(?string $vodoZona): void
    {
        $this->vodoZona = $vodoZona;
    }

    /**
     * @return string|null
     */
    public function getGlubokVipuski(): ?string
    {
        return $this->glubokVipuski;
    }

    /**
     * @param string|null $glubokVipuski
     */
    public function setGlubokVipuski(?string $glubokVipuski): void
    {
        $this->glubokVipuski = $glubokVipuski;
    }


}
