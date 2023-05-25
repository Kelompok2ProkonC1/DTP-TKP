PGDMP     5                     {         
   db_dtp_tkp    15.2    15.2 @    K           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            L           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            M           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            N           1262    16555 
   db_dtp_tkp    DATABASE     �   CREATE DATABASE db_dtp_tkp WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE db_dtp_tkp;
                postgres    false            �            1259    16556    divisi    TABLE     0  CREATE TABLE public.divisi (
    id bigint NOT NULL,
    nama_divisi character varying(255) NOT NULL,
    deskripsi_divisi character varying(255) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.divisi;
       public         heap    postgres    false            �            1259    16563    divisi_id_seq    SEQUENCE     v   CREATE SEQUENCE public.divisi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.divisi_id_seq;
       public          postgres    false    214            O           0    0    divisi_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.divisi_id_seq OWNED BY public.divisi.id;
          public          postgres    false    215            �            1259    16564    kategori    TABLE     6  CREATE TABLE public.kategori (
    id bigint NOT NULL,
    nama_kategori character varying(255) NOT NULL,
    deskripsi_kategori character varying(255) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.kategori;
       public         heap    postgres    false            �            1259    16571    kategori_id_seq    SEQUENCE     x   CREATE SEQUENCE public.kategori_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.kategori_id_seq;
       public          postgres    false    216            P           0    0    kategori_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.kategori_id_seq OWNED BY public.kategori.id;
          public          postgres    false    217            �            1259    16572 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16575    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    218            Q           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    219            �            1259    16576 	   pelatihan    TABLE     �  CREATE TABLE public.pelatihan (
    id bigint NOT NULL,
    judul_pelatihan character varying(255) NOT NULL,
    tempat_pelatihan character varying(255) NOT NULL,
    scope_pelatihan character varying(20) NOT NULL,
    bersetifikat boolean NOT NULL,
    gambar_pelatihan character varying(255) NOT NULL,
    deskripsi_pelatihan character varying(255) NOT NULL,
    biaya_pelatihan bigint NOT NULL,
    tanggal_dimulai date NOT NULL,
    tanggal_berakhir date,
    id_kategori bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.pelatihan;
       public         heap    postgres    false            �            1259    16583    pelatihan_id_seq    SEQUENCE     y   CREATE SEQUENCE public.pelatihan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pelatihan_id_seq;
       public          postgres    false    220            R           0    0    pelatihan_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.pelatihan_id_seq OWNED BY public.pelatihan.id;
          public          postgres    false    221            �            1259    16584 	   pengajuan    TABLE     �  CREATE TABLE public.pengajuan (
    id bigint NOT NULL,
    tanggal_pengajuan date DEFAULT CURRENT_TIMESTAMP NOT NULL,
    tanggal_verifikasi date,
    status_pengajuan character varying(10) NOT NULL,
    id_pelatihan bigint NOT NULL,
    id_user bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    id_admin bigint,
    id_surat bigint,
    deskripsi_revisi character varying
);
    DROP TABLE public.pengajuan;
       public         heap    postgres    false            �            1259    16590    pengajuan_id_seq    SEQUENCE     y   CREATE SEQUENCE public.pengajuan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pengajuan_id_seq;
       public          postgres    false    222            S           0    0    pengajuan_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.pengajuan_id_seq OWNED BY public.pengajuan.id;
          public          postgres    false    223            �            1259    16591    surat    TABLE     �   CREATE TABLE public.surat (
    id integer NOT NULL,
    nomer_surat integer NOT NULL,
    id_pengajuan bigint,
    updated_at timestamp without time zone,
    created_at timestamp without time zone
);
    DROP TABLE public.surat;
       public         heap    postgres    false            �            1259    16594    surat_id_seq    SEQUENCE     �   CREATE SEQUENCE public.surat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.surat_id_seq;
       public          postgres    false    224            T           0    0    surat_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.surat_id_seq OWNED BY public.surat.id;
          public          postgres    false    225            �            1259    16595    surat_nomer_surat_seq    SEQUENCE     �   CREATE SEQUENCE public.surat_nomer_surat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.surat_nomer_surat_seq;
       public          postgres    false    224            U           0    0    surat_nomer_surat_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.surat_nomer_surat_seq OWNED BY public.surat.nomer_surat;
          public          postgres    false    226            �            1259    16596    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    nama_user character varying(255) NOT NULL,
    nik_user character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role_user character varying(12) NOT NULL,
    id_divisi bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16603    user_id_seq    SEQUENCE     t   CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    227            V           0    0    user_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.user_id_seq OWNED BY public.users.id;
          public          postgres    false    228            �           2604    16604 	   divisi id    DEFAULT     f   ALTER TABLE ONLY public.divisi ALTER COLUMN id SET DEFAULT nextval('public.divisi_id_seq'::regclass);
 8   ALTER TABLE public.divisi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            �           2604    16605    kategori id    DEFAULT     j   ALTER TABLE ONLY public.kategori ALTER COLUMN id SET DEFAULT nextval('public.kategori_id_seq'::regclass);
 :   ALTER TABLE public.kategori ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216            �           2604    16606    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            �           2604    16607    pelatihan id    DEFAULT     l   ALTER TABLE ONLY public.pelatihan ALTER COLUMN id SET DEFAULT nextval('public.pelatihan_id_seq'::regclass);
 ;   ALTER TABLE public.pelatihan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220            �           2604    16608    pengajuan id    DEFAULT     l   ALTER TABLE ONLY public.pengajuan ALTER COLUMN id SET DEFAULT nextval('public.pengajuan_id_seq'::regclass);
 ;   ALTER TABLE public.pengajuan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222            �           2604    16609    surat id    DEFAULT     d   ALTER TABLE ONLY public.surat ALTER COLUMN id SET DEFAULT nextval('public.surat_id_seq'::regclass);
 7   ALTER TABLE public.surat ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224            �           2604    16610    surat nomer_surat    DEFAULT     v   ALTER TABLE ONLY public.surat ALTER COLUMN nomer_surat SET DEFAULT nextval('public.surat_nomer_surat_seq'::regclass);
 @   ALTER TABLE public.surat ALTER COLUMN nomer_surat DROP DEFAULT;
       public          postgres    false    226    224            �           2604    16611    users id    DEFAULT     c   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227            :          0    16556    divisi 
   TABLE DATA           [   COPY public.divisi (id, nama_divisi, deskripsi_divisi, created_at, updated_at) FROM stdin;
    public          postgres    false    214   -M       <          0    16564    kategori 
   TABLE DATA           a   COPY public.kategori (id, nama_kategori, deskripsi_kategori, created_at, updated_at) FROM stdin;
    public          postgres    false    216   N       >          0    16572 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    218   �N       @          0    16576 	   pelatihan 
   TABLE DATA           �   COPY public.pelatihan (id, judul_pelatihan, tempat_pelatihan, scope_pelatihan, bersetifikat, gambar_pelatihan, deskripsi_pelatihan, biaya_pelatihan, tanggal_dimulai, tanggal_berakhir, id_kategori, created_at, updated_at) FROM stdin;
    public          postgres    false    220   nO       B          0    16584 	   pengajuan 
   TABLE DATA           �   COPY public.pengajuan (id, tanggal_pengajuan, tanggal_verifikasi, status_pengajuan, id_pelatihan, id_user, created_at, updated_at, id_admin, id_surat, deskripsi_revisi) FROM stdin;
    public          postgres    false    222   �P       D          0    16591    surat 
   TABLE DATA           V   COPY public.surat (id, nomer_surat, id_pengajuan, updated_at, created_at) FROM stdin;
    public          postgres    false    224   cQ       G          0    16596    users 
   TABLE DATA           w   COPY public.users (id, nama_user, nik_user, email, password, role_user, id_divisi, created_at, updated_at) FROM stdin;
    public          postgres    false    227   �Q       W           0    0    divisi_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.divisi_id_seq', 14, true);
          public          postgres    false    215            X           0    0    kategori_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.kategori_id_seq', 4, true);
          public          postgres    false    217            Y           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
          public          postgres    false    219            Z           0    0    pelatihan_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.pelatihan_id_seq', 16, true);
          public          postgres    false    221            [           0    0    pengajuan_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.pengajuan_id_seq', 9, true);
          public          postgres    false    223            \           0    0    surat_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.surat_id_seq', 15, true);
          public          postgres    false    225            ]           0    0    surat_nomer_surat_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.surat_nomer_surat_seq', 15, true);
          public          postgres    false    226            ^           0    0    user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.user_id_seq', 5, true);
          public          postgres    false    228            �           2606    16613    divisi divisi_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.divisi
    ADD CONSTRAINT divisi_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.divisi DROP CONSTRAINT divisi_pkey;
       public            postgres    false    214            �           2606    16615    kategori kategori_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.kategori DROP CONSTRAINT kategori_pkey;
       public            postgres    false    216            �           2606    16617    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    218            �           2606    16619    pelatihan pelatihan_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT pelatihan_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pelatihan DROP CONSTRAINT pelatihan_pkey;
       public            postgres    false    220            �           2606    16621    pengajuan pengajuan_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_pkey;
       public            postgres    false    222            �           2606    16623    surat surat_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.surat
    ADD CONSTRAINT surat_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.surat DROP CONSTRAINT surat_pkey;
       public            postgres    false    224            �           2606    16625    users user_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY public.users DROP CONSTRAINT user_pkey;
       public            postgres    false    227            �           2606    16626    pengajuan fk_surat    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT fk_surat FOREIGN KEY (id_surat) REFERENCES public.surat(id) ON DELETE RESTRICT;
 <   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT fk_surat;
       public          postgres    false    224    222    3234            �           2606    16631 '   pelatihan pelatihan_id_kategori_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT pelatihan_id_kategori_foreign FOREIGN KEY (id_kategori) REFERENCES public.kategori(id) ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public.pelatihan DROP CONSTRAINT pelatihan_id_kategori_foreign;
       public          postgres    false    216    220    3226            �           2606    16636 !   pengajuan pengajuan_id_admin_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_id_admin_fkey FOREIGN KEY (id_admin) REFERENCES public.users(id) ON DELETE RESTRICT;
 K   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_id_admin_fkey;
       public          postgres    false    3236    227    222            �           2606    16641 (   pengajuan pengajuan_id_pelatihan_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_id_pelatihan_foreign FOREIGN KEY (id_pelatihan) REFERENCES public.pelatihan(id) ON DELETE RESTRICT;
 R   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_id_pelatihan_foreign;
       public          postgres    false    222    3230    220            �           2606    16646 #   pengajuan pengajuan_id_user_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_id_user_foreign FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE RESTRICT;
 M   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_id_user_foreign;
       public          postgres    false    227    222    3236            �           2606    16651    surat surat_id_pengajuan_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.surat
    ADD CONSTRAINT surat_id_pengajuan_fkey FOREIGN KEY (id_pengajuan) REFERENCES public.pengajuan(id) ON DELETE RESTRICT;
 G   ALTER TABLE ONLY public.surat DROP CONSTRAINT surat_id_pengajuan_fkey;
       public          postgres    false    3232    222    224            �           2606    16656    users user_id_divisi_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_id_divisi_foreign FOREIGN KEY (id_divisi) REFERENCES public.divisi(id) ON DELETE RESTRICT;
 F   ALTER TABLE ONLY public.users DROP CONSTRAINT user_id_divisi_foreign;
       public          postgres    false    227    3224    214            :   �   x����N�0@�3_�(��q_�H9����%�Bݝ�+_O;�xD#=i���(�p7j����������Pe�
��i�?|�;O?�ԁ(�Bs�Ќ�qӶ�R�f�ͻ�9�����je>om��C��{�z�K,��"�x;L���W��氄~{�Zh+�ŵ��ZsXæKBV�k�`��*�Yy	����\Ȳ����![X��<��Cv���Xs�x���̝�      <   |   x�u�1
1��:9�\`%�l`Ig)�l�0Ƒd\b����~���ͱ�K�p���Ja�l�4����� �����[���K��gv6W�Q�SWѲA�4n+Wz����[t[
3x��=������8o      >   �   x�]�K� ��u=L� ��K�ɨS�i@��k�Ŭ�&�M
PA�����8{v'��A"�N�M��kб�)&钔(
\�)y����V���/׫���B�Ď4 �5��؞�X�P��F��� U�V6�c��ev�
�&�0Z���V:;~�+e�h2/w\��2�xl���qO����      @      x����j�0E��W�8���Z�B)4mh7-t3��qj���E��r���-B\]�J����غ��9��ƑGW�Β;���aW6+ғ��B� ��8�`BF��9IA~6:b	pi�2\�y�s����!<��|pyaֶ�����6�\�g!��%=JI@��Fp��G�� ���]�l_ɦ�fs�M<c�m*��z�5������ ��� Th9�Q	o�GX���{R'*]�X%�ݾ8���ٶ�a���:�%IOAe �V
	<6:52�<li�2,�oJ��p��      B   �   x�u���0Dg�+�E�'�gF�t��P!�\@mZ@�p:�_�(7A��Ml���T��\E<����*�UP1C�?W���4��6�,��GV!��짘U2����~5591���j��y����<B���(~�Gc����h�8BgI-gh����J�����bT
���ǵ����s�	��V`      D   F   x�3�4�4�4202�50�52Q00�#lb\�@�fD�6�AbU�r�%B�T�������� �W� t@!U      G   �   x���;O�0����)<dm�#NbOC�DQyTE,��!qh�귧Q$�c��t���NA����U'���yR5h��m ���`Z�i���~v�.n���������e��m�l{���*ˋ�E����&ҧ�:� ��#�FLS!���`��G�E�'�k�ἭKZ�I�`g�m�;o������6y�%�i#�߼GX	s��M�+:��q}����9���<.�P��m�=�	!���     