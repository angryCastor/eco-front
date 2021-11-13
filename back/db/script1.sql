create table eco_org_nvos
(
    id_nvos            numeric(38) not null
        constraint eco_org_nvos_pk
            primary key,
    klass              varchar(250),
    name_obj           varchar(2500),
    oktmo              varchar(250),
    adress_mesto       varchar(2500),
    name_eksp_org      varchar(2500),
    adress_ur          varchar(2500),
    inn                varchar(250),
    ogrn               varchar(250),
    organ_vid          varchar(250),
    organ_kontr        varchar(250),
    okpd               varchar(250),
    okved              varchar(500),
    kat_obj            varchar(250),
    uroven             varchar(250),
    kat_nvos           varchar(500),
    nom_ras_vib        varchar(250),
    date_ras_vib_beg   varchar(250),
    date_ras_vib_end   varchar(250),
    kol_ist_vib        varchar(250),
    summ_vibros        varchar(250),
    nom_ras_sbros      varchar(250),
    date_ras_sbros_beg varchar(250),
    date_ras_sbros_end varchar(250),
    kol_sbros          varchar(250),
    summ_sbros         varchar(250),
    nom_ras_rasm       varchar(250),
    date_ras_rasm_beg  varchar(250),
    date_ras_rasm_end  varchar(250),
    kol_rasm           varchar(250),
    summ_mas_oth       varchar(250),
    vib_par_gas        varchar(250),
    date_post_uch      varchar(250),
    date_act_sved      varchar(250),
    date_iskl          varchar(250),
    date_vvoda         varchar(250),
    vodo_zona          varchar(250),
    glubok_vipuski     varchar(250)
);

alter table eco_org_nvos
    owner to postgres;

create table eco_reestr_lic_oth
(
    id_reestr_lic_oth      numeric not null
        constraint eco_reestr_lic_oth_pk
            primary key,
    id_lic_oth             numeric,
    company                varchar(200),
    adres                  varchar(200),
    phone                  varchar(200),
    ogrn                   numeric,
    inn                    numeric,
    date_in                timestamp,
    date_validity          varchar(200),
    number_date_lic        varchar(155),
    date_validity1         varchar(200),
    number_date_lic_dubl   varchar(155),
    osnov_date_licvid      varchar(155),
    name_oth               varchar(1000),
    code_oth_fkko          varchar(155),
    class_danger           varchar(10),
    lic_deyat              varchar(1000),
    adres_lic              varchar(1000),
    number_date_revision1  varchar(200),
    number_date_revision2  varchar(200),
    date_rekvisit_adm_nak1 varchar(200),
    date_stop_lic          varchar(200),
    prim                   varchar(1000)
);

alter table eco_reestr_lic_oth
    owner to postgres;

create table eco_reestr_ras_vibros
(
    id_ras        numeric not null
        constraint eco_reestr_ras_vibros_pk
            primary key,
    id_nom_plosha varchar(200),
    name_ur       varchar(2000),
    adress_ur     varchar(2000),
    inn           numeric,
    nom_date_vid  varchar(200),
    srok          varchar(200),
    pazresh       varchar(200),
    ammiak        varchar(200),
    serovodorod   varchar(200),
    formaldegid   varchar(200),
    fenol         varchar(200)
);

alter table eco_reestr_ras_vibros
    owner to postgres;

create table users
(
    id       integer not null
        constraint users_pk
            primary key,
    username varchar(180),
    roles    json,
    password varchar(255),
    salt     varchar(255)
);

alter table users
    owner to postgres;

create table eco_user
(
    id      integer not null
        constraint eco_user_pk
            primary key,
    fio     varchar(200),
    id_user integer
        constraint eco_user_users_id_fk
            references users
);

alter table eco_user
    owner to postgres;

create table eco_reestr_lic_zag
(
    id_reestr_lic_zag numeric not null
        constraint eco_reestr_lic_zag_pk
            primary key,
    nom               varchar(2000),
    reg_nom           varchar(2000),
    seria_lic         varchar(2000),
    name_lic_organa   varchar(2000),
    osnov_resh        varchar(2000),
    osnov_precrach    varchar(2000),
    name_org          varchar(2000),
    inn_ogrn          varchar(2000),
    vid               varchar(2000),
    osnov_proverok    varchar(2000),
    osnov_ostanov     varchar(2000),
    adress_ur         varchar(2000),
    phone             varchar(2000),
    mesto             varchar(2000)
);

alter table eco_reestr_lic_zag
    owner to postgres;

create unique index eco_reestr_lic_zag_id_reestr_lic_zag_uindex
    on eco_reestr_lic_zag (id_reestr_lic_zag);

create table eco_counters_type
(
    id_counters_type integer not null
        constraint eco_counters_type_pk
            primary key,
    name             varchar
);

alter table eco_counters_type
    owner to postgres;

create table eco_counters
(
    id_counters   integer not null
        constraint eco_counters_pk
            primary key,
    name          varchar,
    address       varchar,
    geo_lat       varchar,
    geo_lon       varchar,
    counters_type integer
        constraint eco_counters_eco_counters_type_id_counters_type_fk
            references eco_counters_type
);

alter table eco_counters
    owner to postgres;

create unique index eco_counters_id_counters_uindex
    on eco_counters (id_counters);

create table eco_kat_okved
(
    id_kat_okved integer not null
        constraint eco_kat_okved_pk
            primary key,
    kat          varchar(4000),
    name         varchar(4000),
    okved        varchar(4000),
    okved_name   varchar(4000),
    punct_post   varchar(4000),
    new_column   numeric(38)
);

alter table eco_kat_okved
    owner to postgres;

create table eco_kat_okved_group
(
    id           integer not null
        constraint eco_kat_okved_group_pk
            primary key,
    id_kat_okved integer
        constraint eco_kat_okved_group_eco_kat_okved_id_kat_okved_fk
            references eco_kat_okved,
    okved        varchar,
    okved_name   varchar
);

alter table eco_kat_okved_group
    owner to postgres;

create table eco_org_tax
(
    id_eco_org    numeric(38) not null
        constraint eco_org_pk
            primary key,
    name_org      varchar(250),
    inn           varchar(250),
    kpp           varchar(250),
    adress        varchar(250),
    fam           varchar(250),
    im            varchar(250),
    ot            varchar(250),
    vid           varchar(250),
    tel           varchar(250),
    email         varchar(250),
    viruch        varchar(250),
    price         varchar(250),
    id_edo        varchar(250),
    okpo          varchar(25),
    reg           varchar(25),
    kod           varchar(25),
    site          varchar(250),
    egaic         varchar(25),
    gln           varchar(25),
    okved         varchar,
    okveds        varchar,
    geo_lat       varchar,
    geo_lon       varchar,
    ch_okved      integer,
    ch_lic_oth    integer,
    ch_lic_vibros integer,
    ch_lic_met    integer,
    adress_load   varchar,
    ch_nvos       integer,
    id_nvos       integer
        constraint eco_org_tax_eco_org_nvos_id_nvos_fk
            references eco_org_nvos,
    id_lic_oth    integer
        constraint eco_org_tax_eco_reestr_lic_oth_id_reestr_lic_oth_fk
            references eco_reestr_lic_oth,
    id_lic_met    integer
        constraint eco_org_tax_eco_reestr_lic_zag_id_reestr_lic_zag_fk
            references eco_reestr_lic_zag,
    id_lic_vibros integer
        constraint eco_org_tax_eco_reestr_ras_vibros_id_ras_fk
            references eco_reestr_ras_vibros,
    id_okved      integer
        constraint eco_org_tax_eco_kat_okved_group_id_fk
            references eco_kat_okved_group
);

alter table eco_org_tax
    owner to postgres;

create unique index eco_org_id_eco_org_uindex
    on eco_org_tax (id_eco_org);

create table eco_revision
(
    id_revision integer not null
        constraint eco_revision_pk
            primary key,
    id_org_tax  integer
        constraint eco_revision_eco_org_tax_id_eco_org_fk
            references eco_org_tax,
    id_user     integer
        constraint eco_revision_eco_user_id_fk
            references eco_user,
    date_prov   date,
    date_ispoln date,
    commet      varchar
);

alter table eco_revision
    owner to postgres;

create unique index eco_revision_id_revision_uindex
    on eco_revision (id_revision);

create unique index eco_kat_okved_id_kat_okved_uindex
    on eco_kat_okved (id_kat_okved);

create table eco_okved
(
    id_okved   numeric(38) not null
        constraint eco_okved_pk
            primary key,
    kod        varchar(250),
    name_okved varchar(2500)
);

alter table eco_okved
    owner to postgres;

create unique index eco_okved_id_okved_uindex
    on eco_okved (id_okved);


