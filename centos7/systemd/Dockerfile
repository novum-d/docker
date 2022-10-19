FROM local/c7-systemd
RUN yum -y install httpd; yum clean all; systemctl enable httpd.service
CMD ["/usr/sbin/init"]
