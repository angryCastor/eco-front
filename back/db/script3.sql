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

create view v_eco_stat1(title, value) as
SELECT 'Состоящие на учете в НВОС'::text AS title,
       count(*)                          AS value
FROM eco_org_tax t
WHERE t.ch_nvos = 1
UNION ALL
SELECT 'Не состоящие на учете в НВОС'::text AS title,
       count(*)                             AS value
FROM eco_org_tax t
WHERE t.ch_nvos = 0
  AND (t.ch_lic_oth = 1 OR t.ch_lic_vibros = 1 OR t.ch_lic_met = 1 OR t.ch_okved = 1);

alter table v_eco_stat1
    owner to postgres;

create view v_eco_stat2(title, value) as
SELECT 'Состоящие на учете в НВОС'::text AS title,
       count(*)                          AS value
FROM eco_org_tax t
WHERE t.ch_nvos = 1
UNION ALL
SELECT 'Имеющие лицензий на обращение с отходами'::text AS title,
       count(*)                                         AS value
FROM eco_org_tax t
WHERE t.ch_lic_oth = 1
UNION ALL
SELECT 'Имеющие разрешения на выбросы загрязняющих веществ'::text AS title,
       count(*)                                                   AS value
FROM eco_org_tax t
WHERE t.ch_lic_vibros = 1
UNION ALL
SELECT 'Имеющие лицензий на переработку металлов'::text AS title,
       count(*)                                         AS value
FROM eco_org_tax t
WHERE t.ch_lic_met = 1
UNION ALL
SELECT 'Имеющие ОКВЭД подлежащие учету в НВОС'::text AS title,
       count(*)                                      AS value
FROM eco_org_tax t
WHERE t.ch_okved = 1;

alter table v_eco_stat2
    owner to postgres;


