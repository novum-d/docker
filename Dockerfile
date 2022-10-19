FROM centos:7
ENV container docker \
    LANG="ja_JP UTF-8" \
    LANGUAGE="ja_JP:ja" \
    LC_ALL="ja_JP.UTF-8" \
    TZ="Asia/Tokyo"
RUN (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == \
systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*; \
yum -y update; \
yum clean all; \
localedef -f UTF-8 -i ja_JP ja_JP.UTF-8; \
ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime; \
yum install vim-enhanced -y; \
yum install git -y; \
VOLUME [ "/sys/fs/cgroup" ]
CMD ["/usr/sbin/init"]
